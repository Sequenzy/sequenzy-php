<?php

namespace Sequenzy\ReceivingDomains;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\ReceivingDomains\Requests\AddReceivingDomainRequest;
use Sequenzy\Types\ReceivingDomainCreateResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Types\ReceivingDomainResponse;
use Sequenzy\ReceivingDomains\Types\ListReceivingDomainsResponse;

class ReceivingDomainsClient
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
     * Adds your workspace's receiving domain, a domain or subdomain whose mail should reach your Inbox, and returns the DNS records to publish. A workspace has one receiving domain. Once it is verified, replies to emails from all your sending domains come back to reply addresses on it, and its first verification turns Inbox on; until then replies use inbound.sequenzy.com. Mail for a domain goes wherever its MX records point, so a domain whose MX records already point at another mail service (Google Workspace, Microsoft 365, Cloudflare Email Routing) is refused: use a subdomain such as support.acme.com instead. When the workspace already has a receiving domain, a different name is refused with limit_reached before any DNS lookup. Adding a name this workspace already has returns it unchanged with created false, without checking its MX records again, so retries are safe. Adding the first receiving domain also sets the company's reply domain mode to custom. Requires the websites:write scope and owner or admin access.
     *
     * Example:
     * ```php
     * $client->receivingDomains->addReceivingDomain(
     *     new AddReceivingDomainRequest([
     *         'domain' => 'support.acme.com',
     *     ]),
     * );
     * ```
     *
     * @param AddReceivingDomainRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ReceivingDomainCreateResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function addReceivingDomain(AddReceivingDomainRequest $request, ?array $options = null): ?ReceivingDomainCreateResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "receiving-domains",
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
                return ReceivingDomainCreateResponse::fromJson($json);
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
     * Returns one receiving domain from the latest stored check. To check its DNS now, use Verify receiving domain. Requires the websites:read scope.
     *
     * Example:
     * ```php
     * $client->receivingDomains->getReceivingDomain(
     *     'support.acme.com',
     * );
     * ```
     *
     * @param string $domain The receiving domain's name, such as support.acme.com, or its id.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ReceivingDomainResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getReceivingDomain(string $domain, ?array $options = null): ?ReceivingDomainResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "receiving-domains/{$domain}",
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
                return ReceivingDomainResponse::fromJson($json);
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
     * Lists the domains and subdomains whose mail reaches your Inbox, in alphabetical order, with their status and the DNS records to publish. A workspace has one receiving domain; workspaces that set up several before keep them, and replies then use the sender's own domain or one on the same root, else the oldest verified one. Requires the websites:read scope. Marketer personal API keys cannot use receiving domain endpoints.
     *
     * Example:
     * ```php
     * $client->receivingDomains->listReceivingDomains();
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
     * @return ?ListReceivingDomainsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listReceivingDomains(?array $options = null): ?ListReceivingDomainsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "receiving-domains",
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
                return ListReceivingDomainsResponse::fromJson($json);
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
     * Removes a receiving domain and returns it as it was. Mail to every address on it stops arriving, including replies to emails already sent with reply addresses on it, and a branded inbox address on it is cleared. Remove Sequenzy's MX record from your DNS afterwards. Requires the websites:delete scope and owner or admin access.
     *
     * Example:
     * ```php
     * $client->receivingDomains->removeReceivingDomain(
     *     'support.acme.com',
     * );
     * ```
     *
     * @param string $domain The receiving domain's name, such as support.acme.com, or its id.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ReceivingDomainResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function removeReceivingDomain(string $domain, ?array $options = null): ?ReceivingDomainResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "receiving-domains/{$domain}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ReceivingDomainResponse::fromJson($json);
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
     * Checks the domain's DNS records and Amazon SES setup now instead of waiting for the next automatic check, and returns the result. The first time a receiving domain added with Add receiving domain becomes verified, Inbox turns on (replyTrackingEnabled becomes true). Domains moved from an older reply setup or added through Update inbox address leave the Inbox setting unchanged. Requires the websites:write scope and owner or admin access.
     *
     * Example:
     * ```php
     * $client->receivingDomains->verifyReceivingDomain(
     *     'support.acme.com',
     * );
     * ```
     *
     * @param string $domain The receiving domain's name, such as support.acme.com, or its id.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ReceivingDomainResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function verifyReceivingDomain(string $domain, ?array $options = null): ?ReceivingDomainResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "receiving-domains/{$domain}/verify",
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
                return ReceivingDomainResponse::fromJson($json);
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
