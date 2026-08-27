<?php

namespace Sequenzy\WebTrackingKeys;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\WebTrackingKeys\Requests\CreateWebTrackingKeysRequest;
use Sequenzy\WebTrackingKeys\Types\CreateWebTrackingKeysResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\WebTrackingKeys\Types\DeleteWebTrackingKeysResponse;
use Sequenzy\WebTrackingKeys\Types\GetWebTrackingKeysResponse;
use Sequenzy\WebTrackingKeys\Types\ListWebTrackingKeysResponse;
use Sequenzy\WebTrackingKeys\Requests\MintIdentityWebTrackingKeysRequest;
use Sequenzy\WebTrackingKeys\Types\MintIdentityWebTrackingKeysResponse;
use Sequenzy\WebTrackingKeys\Requests\UpdateWebTrackingKeysRequest;
use Sequenzy\WebTrackingKeys\Types\UpdateWebTrackingKeysResponse;

class WebTrackingKeysClient
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
     * Creates a publishable key for the browser tracking SDK and returns the script tag to install. The key ships in page source by design and authorizes storefront events only, never the rest of the API. Events start flowing once the snippet is deployed and nothing is backfilled for the period before that. Always pass allowedOrigins - an empty allowlist accepts events from any site. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->webTrackingKeys->create(
     *     new CreateWebTrackingKeysRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param CreateWebTrackingKeysRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateWebTrackingKeysResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateWebTrackingKeysRequest $request, ?array $options = null): ?CreateWebTrackingKeysResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "web-tracking-keys",
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
                return CreateWebTrackingKeysResponse::fromJson($json);
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
     * Permanently deletes a web tracking key. Cached authorization expires within one minute, after which requests from a remaining snippet are rejected. Remove the snippet as well. Prefer revoking with isActive false when the key may be needed again. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->webTrackingKeys->delete(
     *     'id',
     * );
     * ```
     *
     * @param string $id Web tracking key ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteWebTrackingKeysResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $id, ?array $options = null): ?DeleteWebTrackingKeysResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "web-tracking-keys/{$id}",
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
                return DeleteWebTrackingKeysResponse::fromJson($json);
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
     * Returns one web tracking key with its install snippet and ingest endpoint. The snippet embeds both the publishable key and the workspace id, so use it as returned rather than rebuilding it. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->webTrackingKeys->get(
     *     'id',
     * );
     * ```
     *
     * @param string $id Web tracking key ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetWebTrackingKeysResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $id, ?array $options = null): ?GetWebTrackingKeysResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "web-tracking-keys/{$id}",
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
                return GetWebTrackingKeysResponse::fromJson($json);
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
     * Lists the publishable keys that let a website send on-site events (product views, cart activity, collection views, search) into this workspace. Each key includes a paste-ready install snippet and its origin allowlist. A key whose lastUsedAt is null has not successfully authenticated an event yet; it may be undeployed, have no instrumented traffic, or be sending requests rejected by its origin allowlist. Shopify stores use the storefront pixel instead. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->webTrackingKeys->list();
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
     * @return ?ListWebTrackingKeysResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(?array $options = null): ?ListWebTrackingKeysResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "web-tracking-keys",
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
                return ListWebTrackingKeysResponse::fromJson($json);
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
     * Mints a short-lived HMAC proof bound to one active web tracking key, workspace, and normalized email. Identify the key by keyId or by its publishable publicKey value. If the email is not yet a contact, one is created (active, no lists, no automations triggered) so identified events are attributed instead of being silently dropped. Call this only from an authenticated backend; never expose the secret API key in browser code. Identified browser events without this proof are rejected before queueing. Requires commerce:write, automations:trigger, and subscribers:write (minting can create the contact).
     *
     * Example:
     * ```php
     * $client->webTrackingKeys->mintIdentity(
     *     new MintIdentityWebTrackingKeysRequest([
     *         'email' => 'email',
     *     ]),
     * );
     * ```
     *
     * @param MintIdentityWebTrackingKeysRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MintIdentityWebTrackingKeysResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function mintIdentity(MintIdentityWebTrackingKeysRequest $request, ?array $options = null): ?MintIdentityWebTrackingKeysResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "web-tracking-identities",
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
                return MintIdentityWebTrackingKeysResponse::fromJson($json);
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
     * Renames a key, replaces its allowed origins, or revokes it. allowedOrigins replaces the whole list rather than appending. Revoking stops events within about a minute while preserving the key value, so the matching snippet can still be found and removed from the site. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->webTrackingKeys->update(
     *     'id',
     *     new UpdateWebTrackingKeysRequest([]),
     * );
     * ```
     *
     * @param string $id Web tracking key ID.
     * @param UpdateWebTrackingKeysRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateWebTrackingKeysResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $id, UpdateWebTrackingKeysRequest $request = new UpdateWebTrackingKeysRequest(), ?array $options = null): ?UpdateWebTrackingKeysResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "web-tracking-keys/{$id}",
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
                return UpdateWebTrackingKeysResponse::fromJson($json);
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
