<?php

namespace Sequenzy\LandingPages;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\LandingPages\Requests\ConnectDedicatedDomainLandingPagesRequest;
use Sequenzy\LandingPages\Types\ConnectDedicatedDomainLandingPagesResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\LandingPages\Requests\ConnectDomainLandingPagesRequest;
use Sequenzy\LandingPages\Types\ConnectDomainLandingPagesResponse;
use Sequenzy\LandingPages\Requests\CreateLandingPagesRequest;
use Sequenzy\LandingPages\Types\CreateLandingPagesResponse;
use Sequenzy\LandingPages\Types\DeleteLandingPagesResponse;
use Sequenzy\LandingPages\Requests\DuplicateLandingPagesRequest;
use Sequenzy\LandingPages\Types\DuplicateLandingPagesResponse;
use Sequenzy\LandingPages\Types\GetLandingPagesResponse;
use Sequenzy\LandingPages\Types\GetDedicatedDomainLandingPagesResponse;
use Sequenzy\LandingPages\Types\GetDomainLandingPagesResponse;
use Sequenzy\LandingPages\Requests\GetStatsLandingPagesRequest;
use Sequenzy\LandingPages\Types\GetStatsLandingPagesResponse;
use Sequenzy\LandingPages\Types\ListLandingPagesResponse;
use Sequenzy\LandingPages\Requests\PublishLandingPagesRequest;
use Sequenzy\LandingPages\Types\PublishLandingPagesResponse;
use Sequenzy\LandingPages\Types\RemoveDedicatedDomainLandingPagesResponse;
use Sequenzy\LandingPages\Types\RenderLandingPagesResponse;
use Sequenzy\LandingPages\Requests\UnpublishLandingPagesRequest;
use Sequenzy\LandingPages\Types\UnpublishLandingPagesResponse;
use Sequenzy\LandingPages\Requests\UpdateLandingPagesRequest;
use Sequenzy\LandingPages\Types\UpdateLandingPagesResponse;
use Sequenzy\LandingPages\Requests\UpdateDomainSettingsLandingPagesRequest;
use Sequenzy\LandingPages\Types\UpdateDomainSettingsLandingPagesResponse;
use Sequenzy\LandingPages\Types\VerifyDedicatedDomainLandingPagesResponse;
use Sequenzy\LandingPages\Types\VerifyDomainLandingPagesResponse;

class LandingPagesClient
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
     * Assigns one hostname to one landing page. The page opens at the hostname root, while existing workspace and Sequenzy URLs remain available.
     *
     * Example:
     * ```php
     * $client->landingPages->connectDedicatedDomain(
     *     'landingPageId',
     *     new ConnectDedicatedDomainLandingPagesRequest([
     *         'domain' => 'offer.example.com',
     *     ]),
     * );
     * ```
     *
     * @param string $landingPageId
     * @param ConnectDedicatedDomainLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ConnectDedicatedDomainLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function connectDedicatedDomain(string $landingPageId, ConnectDedicatedDomainLandingPagesRequest $request, ?array $options = null): ?ConnectDedicatedDomainLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/domain",
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
                return ConnectDedicatedDomainLandingPagesResponse::fromJson($json);
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
     * Connects or replaces the custom domain for published landing pages.
     *
     * Example:
     * ```php
     * $client->landingPages->connectDomain(
     *     new ConnectDomainLandingPagesRequest([
     *         'domain' => 'pages.example.com',
     *     ]),
     * );
     * ```
     *
     * @param ConnectDomainLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ConnectDomainLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function connectDomain(ConnectDomainLandingPagesRequest $request, ?array $options = null): ?ConnectDomainLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/domain",
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
                return ConnectDomainLandingPagesResponse::fromJson($json);
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
     * Creates a draft landing page from default template content or supplied builder JSON.
     *
     * Example:
     * ```php
     * $client->landingPages->create(
     *     new CreateLandingPagesRequest([
     *         'name' => 'Product Waitlist',
     *         'slug' => 'product-waitlist',
     *         'template' => CreateLandingPagesRequestTemplate::Waitlist->value,
     *     ]),
     * );
     * ```
     *
     * @param CreateLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateLandingPagesRequest $request = new CreateLandingPagesRequest(), ?array $options = null): ?CreateLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages",
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
                return CreateLandingPagesResponse::fromJson($json);
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
     * Deletes a landing page.
     *
     * Example:
     * ```php
     * $client->landingPages->delete(
     *     'landingPageId',
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $landingPageId, ?array $options = null): ?DeleteLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}",
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
                return DeleteLandingPagesResponse::fromJson($json);
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
     * Copies a landing page into a new draft with its own slug, views, and conversions. The original keeps its published URL and stats.
     *
     * Example:
     * ```php
     * $client->landingPages->duplicate(
     *     'landingPageId',
     *     new DuplicateLandingPagesRequest([]),
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID to copy
     * @param DuplicateLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DuplicateLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function duplicate(string $landingPageId, DuplicateLandingPagesRequest $request = new DuplicateLandingPagesRequest(), ?array $options = null): ?DuplicateLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/duplicate",
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
                return DuplicateLandingPagesResponse::fromJson($json);
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
     * Returns one landing page with builder content and public URLs.
     *
     * Example:
     * ```php
     * $client->landingPages->get(
     *     'landingPageId',
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $landingPageId, ?array $options = null): ?GetLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}",
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
                return GetLandingPagesResponse::fromJson($json);
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
     * Returns the domain assigned only to this landing page plus its workspace fallback.
     *
     * Example:
     * ```php
     * $client->landingPages->getDedicatedDomain(
     *     'landingPageId',
     * );
     * ```
     *
     * @param string $landingPageId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetDedicatedDomainLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getDedicatedDomain(string $landingPageId, ?array $options = null): ?GetDedicatedDomainLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/domain",
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
                return GetDedicatedDomainLandingPagesResponse::fromJson($json);
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
     * Returns the custom landing page domain settings for the authenticated company.
     *
     * Example:
     * ```php
     * $client->landingPages->getDomain();
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
     * @return ?GetDomainLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getDomain(?array $options = null): ?GetDomainLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/domain",
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
                return GetDomainLandingPagesResponse::fromJson($json);
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
     * Returns visits, unique visits, clicks, subscribes, conversion rate, a daily histogram, referrers, UTM sources, and crawler hits. Default totals exclude known crawlers. Preview URLs and the editor never count. The all period covers retained analytics only; dataAvailableFrom marks the beginning of available event coverage.
     *
     * Example:
     * ```php
     * $client->landingPages->getStats(
     *     'landingPageId',
     *     new GetStatsLandingPagesRequest([]),
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID
     * @param GetStatsLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetStatsLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getStats(string $landingPageId, GetStatsLandingPagesRequest $request = new GetStatsLandingPagesRequest(), ?array $options = null): ?GetStatsLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = $request->end;
        }
        if ($request->includeBots != null) {
            $query['includeBots'] = $request->includeBots;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = $request->start;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/stats",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetStatsLandingPagesResponse::fromJson($json);
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
     * Lists landing pages for the authenticated company.
     *
     * Example:
     * ```php
     * $client->landingPages->list();
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
     * @return ?ListLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(?array $options = null): ?ListLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages",
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
                return ListLandingPagesResponse::fromJson($json);
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
     * Publishes a landing page and optionally updates name, slug, or content first.
     *
     * Example:
     * ```php
     * $client->landingPages->publish(
     *     'landingPageId',
     *     new PublishLandingPagesRequest([]),
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID
     * @param PublishLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PublishLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function publish(string $landingPageId, PublishLandingPagesRequest $request = new PublishLandingPagesRequest(), ?array $options = null): ?PublishLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/publish",
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
                return PublishLandingPagesResponse::fromJson($json);
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
     * Removes only the page-specific hostname. Workspace and Sequenzy fallback URLs remain available.
     *
     * Example:
     * ```php
     * $client->landingPages->removeDedicatedDomain(
     *     'landingPageId',
     * );
     * ```
     *
     * @param string $landingPageId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RemoveDedicatedDomainLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function removeDedicatedDomain(string $landingPageId, ?array $options = null): ?RemoveDedicatedDomainLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/domain",
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
                return RemoveDedicatedDomainLandingPagesResponse::fromJson($json);
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
     * Returns a signed, unlisted preview URL for the current landing page content. Works for drafts. Does not publish the page or collect signup form submissions on a draft preview.
     *
     * Example:
     * ```php
     * $client->landingPages->render(
     *     'landingPageId',
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RenderLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function render(string $landingPageId, ?array $options = null): ?RenderLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/render",
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
                return RenderLandingPagesResponse::fromJson($json);
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
     * Returns a landing page to draft status and optionally updates name, slug, or content first.
     *
     * Example:
     * ```php
     * $client->landingPages->unpublish(
     *     'landingPageId',
     *     new UnpublishLandingPagesRequest([]),
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID
     * @param UnpublishLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UnpublishLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function unpublish(string $landingPageId, UnpublishLandingPagesRequest $request = new UnpublishLandingPagesRequest(), ?array $options = null): ?UnpublishLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/unpublish",
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
                return UnpublishLandingPagesResponse::fromJson($json);
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
     * Updates a landing page name, slug, or builder content.
     *
     * Example:
     * ```php
     * $client->landingPages->update(
     *     'landingPageId',
     *     new UpdateLandingPagesRequest([]),
     * );
     * ```
     *
     * @param string $landingPageId Landing page ID
     * @param UpdateLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $landingPageId, UpdateLandingPagesRequest $request = new UpdateLandingPagesRequest(), ?array $options = null): ?UpdateLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}",
                    method: HttpMethod::PUT,
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
                return UpdateLandingPagesResponse::fromJson($json);
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
     * Replaces the custom landing page domain, verifies the current domain, or both.
     *
     * Example:
     * ```php
     * $client->landingPages->updateDomainSettings(
     *     new UpdateDomainSettingsLandingPagesRequest([]),
     * );
     * ```
     *
     * @param UpdateDomainSettingsLandingPagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateDomainSettingsLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateDomainSettings(UpdateDomainSettingsLandingPagesRequest $request = new UpdateDomainSettingsLandingPagesRequest(), ?array $options = null): ?UpdateDomainSettingsLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/domain",
                    method: HttpMethod::PUT,
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
                return UpdateDomainSettingsLandingPagesResponse::fromJson($json);
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
     * Checks DNS and SSL status for the hostname assigned to this landing page.
     *
     * Example:
     * ```php
     * $client->landingPages->verifyDedicatedDomain(
     *     'landingPageId',
     * );
     * ```
     *
     * @param string $landingPageId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?VerifyDedicatedDomainLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function verifyDedicatedDomain(string $landingPageId, ?array $options = null): ?VerifyDedicatedDomainLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/{$landingPageId}/domain/verify",
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
                return VerifyDedicatedDomainLandingPagesResponse::fromJson($json);
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
     * Checks DNS and SSL status for the current custom landing page domain.
     *
     * Example:
     * ```php
     * $client->landingPages->verifyDomain();
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
     * @return ?VerifyDomainLandingPagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function verifyDomain(?array $options = null): ?VerifyDomainLandingPagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "landing-pages/domain/verify",
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
                return VerifyDomainLandingPagesResponse::fromJson($json);
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
