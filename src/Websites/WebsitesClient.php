<?php

namespace Sequenzy\Websites;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Websites\Requests\AddWebsitesRequest;
use Sequenzy\Websites\Types\AddWebsitesResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Websites\Requests\ConfigureSendingDomainTrackingRequest;
use Sequenzy\Websites\Types\ConfigureSendingDomainTrackingResponse;
use Sequenzy\Websites\Types\GetWebsitesResponse;
use Sequenzy\Websites\Types\ListWebsitesResponse;
use Sequenzy\Websites\Requests\StartSendingDomainDnsUpgradeRequest;
use Sequenzy\Websites\Types\StartSendingDomainDnsUpgradeResponse;
use Sequenzy\Websites\Types\VerifySendingDomainResponse;

class WebsitesClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Adds a sending domain to the authenticated company and returns the SPF, DKIM, MAIL FROM, DMARC, and tracking DNS records required for setup. Tracked links use the company tracking domain, shared by every sending domain: the first domain creates it on its root (links.<root>) and returns its CNAME as dnsRecords.trackingRecord. It is optional and never gates verification or sending. A domain belongs to exactly one company, so confirm the target company before adding it.
     *
     * Example:
     * ```php
     * $client->websites->add(
     *     new AddWebsitesRequest([
     *         'domain' => 'domain',
     *     ]),
     * );
     * ```
     *
     * @param AddWebsitesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AddWebsitesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function add(AddWebsitesRequest $request, ?array $options = null): ?AddWebsitesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "websites",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AddWebsitesResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Deprecated: tracking is company-wide; use PUT /tracking-domain. Sets <trackingPrefix>.<domain> as the company tracking domain when the company has none. Publish the returned tracking.cnameRecord; sending never waits for it, and links use the shared Sequenzy tracking domain until it verifies. Repeating the company's current tracking hostname is a no-op. A different value is accepted but changes nothing, and the response message says so; it never replaces the company setting.
     *
     * Example:
     * ```php
     * $client->websites->configureSendingDomainTracking(
     *     'domain',
     *     new ConfigureSendingDomainTrackingRequest([
     *         'trackingPrefix' => 'trackingPrefix',
     *     ]),
     * );
     * ```
     *
     * @param string $domain Configured sending domain
     * @param ConfigureSendingDomainTrackingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ConfigureSendingDomainTrackingResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function configureSendingDomainTracking(string $domain, ConfigureSendingDomainTrackingRequest $request, ?array $options = null): ?ConfigureSendingDomainTrackingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "websites/{$domain}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ConfigureSendingDomainTrackingResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns verification status and DNS records for a sending domain.
     *
     * Example:
     * ```php
     * $client->websites->get(
     *     'domain',
     * );
     * ```
     *
     * @param string $domain Sending domain
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetWebsitesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $domain, ?array $options = null): ?GetWebsitesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "websites/{$domain}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetWebsitesResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Lists sending domains configured for the authenticated company.
     *
     * Example:
     * ```php
     * $client->websites->list();
     * ```
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWebsitesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(?array $options = null): ?ListWebsitesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "websites",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListWebsitesResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Starts moving a verified sending domain onto the current per-domain CNAME record set without removing it. The domain keeps sending on its current records while the upgrade is in progress, and sender profiles, sequences and tracking stay as they are. Publish the CNAMEs in website.dnsUpgrade.records next to your current records; remove nothing yet. About an hour after the required ones (DKIM and the return path) are visible on public DNS (Google and Cloudflare resolvers), the domain switches by itself; the wait lets cached "does not exist" answers expire. Sequenzy prepares the sending setup of the domain separately and switches only once it is confirmed, so sending is normally not interrupted and no emails are held. If that is not possible for a domain, emails sent through Amazon SES can be held for a few minutes while SES confirms the new setup, then they go out. The domain also gets a new 2048-bit DKIM key; you still publish the same four CNAMEs. An older SES-only domain needs a working DMARC record first, otherwise the request returns 400. Call POST /websites/{domain}/verify after publishing to check now; it does not skip the wait. After the switch, website.dnsUpgrade lists the old records to delete after deleteOldRecordsAfter; for an older SES-only domain these include the old return path records (MX and TXT at send.<domain>) and the DKIM TXT, and DMARC stays. Requires websites:write.
     *
     * Example:
     * ```php
     * $client->websites->startSendingDomainDnsUpgrade(
     *     'domain',
     *     new StartSendingDomainDnsUpgradeRequest([]),
     * );
     * ```
     *
     * @param string $domain Configured sending domain
     * @param StartSendingDomainDnsUpgradeRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?StartSendingDomainDnsUpgradeResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function startSendingDomainDnsUpgrade(string $domain, StartSendingDomainDnsUpgradeRequest $request = new StartSendingDomainDnsUpgradeRequest(), ?array $options = null): ?StartSendingDomainDnsUpgradeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "websites/{$domain}/dns-upgrade",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return StartSendingDomainDnsUpgradeResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Runs a fresh DNS and provider verification and returns normalized aggregate, SPF, DKIM, and MAIL FROM status and diagnostics. It does not check or set up receiving mail; use Verify receiving domain (/receiving-domains/{domain}/verify) for that.
     *
     * Example:
     * ```php
     * $client->websites->verifySendingDomain(
     *     'domain',
     * );
     * ```
     *
     * @param string $domain Configured sending domain
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?VerifySendingDomainResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function verifySendingDomain(string $domain, ?array $options = null): ?VerifySendingDomainResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "websites/{$domain}/verify",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return VerifySendingDomainResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SequenzyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SequenzyException(message: $e->getMessage(), previous: $e);
        }
        throw new SequenzyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
