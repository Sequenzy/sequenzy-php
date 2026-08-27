<?php

namespace Sequenzy\Account;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Account\Requests\CreateApiKeyRequest;
use Sequenzy\Account\Types\CreateApiKeyResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Account\Types\GetAccountResponse;
use Sequenzy\Account\Requests\GetIntegrationGuideRequest;
use Sequenzy\Account\Types\GetIntegrationGuideResponse;
use Sequenzy\Account\Types\ListApiKeysResponse;
use Sequenzy\Account\Requests\RequestApiKeyHandoffRequest;
use Sequenzy\Account\Types\RequestApiKeyHandoffResponse;
use Sequenzy\Account\Types\RevokeApiKeyResponse;
use Sequenzy\Account\Requests\UpdateApiKeyRequest;
use Sequenzy\Account\Types\UpdateApiKeyResponse;

class AccountClient
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
     * Creates a company-scoped API key. The caller must have the `api_keys:manage` permission. Account-scoped keys select the target company with the x-company-id header; companyId in the JSON body is not a supported selector. The plain key is returned only once.
     *
     * Example:
     * ```php
     * $client->account->createApiKey(
     *     new CreateApiKeyRequest([]),
     * );
     * ```
     *
     * @param CreateApiKeyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateApiKeyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createApiKey(CreateApiKeyRequest $request = new CreateApiKeyRequest(), ?array $options = null): ?CreateApiKeyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api-keys",
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
                return CreateApiKeyResponse::fromJson($json);
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
     * Returns the companies available to the authenticated API key, the currently selected company, and a read-only summary of the key's own permissions.
     *
     * Example:
     * ```php
     * $client->account->get();
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
     * @return ?GetAccountResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(?array $options = null): ?GetAccountResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account",
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
                return GetAccountResponse::fromJson($json);
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
     * Returns a framework-specific code example and implementation tip for common integration use cases.
     *
     * Example:
     * ```php
     * $client->account->getIntegrationGuide(
     *     new GetIntegrationGuideRequest([]),
     * );
     * ```
     *
     * @param GetIntegrationGuideRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetIntegrationGuideResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getIntegrationGuide(GetIntegrationGuideRequest $request = new GetIntegrationGuideRequest(), ?array $options = null): ?GetIntegrationGuideResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integration-guide",
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
                return GetIntegrationGuideResponse::fromJson($json);
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
     * Lists company-scoped API keys as non-secret metadata. The caller must have the `api_keys:manage` permission. Account-scoped keys select the company with the x-company-id header. Plain key values and stored hashes are never returned.
     *
     * Example:
     * ```php
     * $client->account->listApiKeys();
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
     * @return ?ListApiKeysResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listApiKeys(?array $options = null): ?ListApiKeysResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api-keys",
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
                return ListApiKeysResponse::fromJson($json);
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
     * Builds a dashboard link that opens the create-key form prefilled with a suggested name and permissions. Requires only `account:read`, because it creates nothing, changes nothing, and returns no secret - the new key is issued in the owner's authenticated browser session. Use it when key management is blocked because the calling key lacks `api_keys:manage`, which cannot be granted through the API by the key that is missing it. Pass replaceApiKeyId to rotate; the dashboard then offers to revoke the predecessor once the replacement exists.
     *
     * Example:
     * ```php
     * $client->account->requestApiKeyHandoff(
     *     new RequestApiKeyHandoffRequest([]),
     * );
     * ```
     *
     * @param RequestApiKeyHandoffRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RequestApiKeyHandoffResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function requestApiKeyHandoff(RequestApiKeyHandoffRequest $request = new RequestApiKeyHandoffRequest(), ?array $options = null): ?RequestApiKeyHandoffResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api-key-handoff",
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
                return RequestApiKeyHandoffResponse::fromJson($json);
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
     * Permanently revokes a company-scoped API key. The caller must have the `api_keys:manage` permission. The response contains non-secret metadata only.
     *
     * Example:
     * ```php
     * $client->account->revokeApiKey(
     *     'apiKeyId',
     * );
     * ```
     *
     * @param string $apiKeyId Exact API key ID returned by the list API keys endpoint.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RevokeApiKeyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function revokeApiKey(string $apiKeyId, ?array $options = null): ?RevokeApiKeyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api-keys/{$apiKeyId}",
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
                return RevokeApiKeyResponse::fromJson($json);
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
     * Renames a company-scoped API key and/or replaces its permissions in place. The caller must have the `api_keys:manage` permission. The key value is unchanged. Added permissions apply on the next retry; removed permissions may remain usable for up to five minutes while API caches expire. `preset` and `scopes` replace the whole selection rather than merging into it. The response contains non-secret metadata only.
     *
     * Example:
     * ```php
     * $client->account->updateApiKey(
     *     'apiKeyId',
     *     new UpdateApiKeyRequest([]),
     * );
     * ```
     *
     * @param string $apiKeyId Exact API key ID returned by the list API keys endpoint.
     * @param UpdateApiKeyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateApiKeyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateApiKey(string $apiKeyId, UpdateApiKeyRequest $request = new UpdateApiKeyRequest(), ?array $options = null): ?UpdateApiKeyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "api-keys/{$apiKeyId}",
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
                return UpdateApiKeyResponse::fromJson($json);
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
