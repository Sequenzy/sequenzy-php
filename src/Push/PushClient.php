<?php

namespace Sequenzy\Push;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Push\Types\CancelPushCampaignResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Push\Types\ClearApnsCredentialsResponse;
use Sequenzy\Push\Types\ClearFcmCredentialsResponse;
use Sequenzy\Push\Requests\CreatePushCampaignRequest;
use Sequenzy\Push\Types\CreatePushCampaignResponse;
use Sequenzy\Push\Types\DeletePushDeviceResponse;
use Sequenzy\Push\Requests\DuplicatePushCampaignRequest;
use Sequenzy\Push\Types\DuplicatePushCampaignResponse;
use Sequenzy\Push\Requests\EstimatePushCampaignRecipientsRequest;
use Sequenzy\Push\Types\EstimatePushCampaignRecipientsResponse;
use Sequenzy\Push\Types\GetPushCampaignResponse;
use Sequenzy\Push\Types\GetPushCampaignStatsResponse;
use Sequenzy\Push\Types\GetPushSettingsResponse;
use Sequenzy\Push\Requests\ListPushCampaignsRequest;
use Sequenzy\Push\Types\ListPushCampaignsResponse;
use Sequenzy\Push\Requests\ListPushDevicesRequest;
use Sequenzy\Push\Types\ListPushDevicesResponse;
use Sequenzy\Push\Requests\RegisterPushDeviceRequest;
use Sequenzy\Push\Types\RegisterPushDeviceResponse;
use Sequenzy\Push\Requests\SendPushCampaignRequest;
use Sequenzy\Push\Types\SendPushCampaignResponse;
use Sequenzy\Push\Requests\SendTestPushRequest;
use Sequenzy\Push\Types\SendTestPushResponse;
use Sequenzy\Push\Requests\SetApnsCredentialsRequest;
use Sequenzy\Push\Types\SetApnsCredentialsResponse;
use Sequenzy\Push\Requests\SetFcmCredentialsRequest;
use Sequenzy\Push\Types\SetFcmCredentialsResponse;
use Sequenzy\Push\Types\UnschedulePushCampaignResponse;
use Sequenzy\Push\Requests\UpdatePushCampaignRequest;
use Sequenzy\Push\Types\UpdatePushCampaignResponse;
use Sequenzy\Push\Requests\UpdateWebPushSettingsRequest;
use Sequenzy\Push\Types\UpdateWebPushSettingsResponse;

class PushClient
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
     * Stops a scheduled or sending push campaign. Contacts who have not been sent the push yet are skipped; delivered notifications cannot be recalled. Requires the campaigns:send scope.
     *
     * Example:
     * ```php
     * $client->push->cancelPushCampaign(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CancelPushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function cancelPushCampaign(string $campaignId, ?array $options = null): ?CancelPushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}/cancel",
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
                return CancelPushCampaignResponse::fromJson($json);
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
     * Removes the APNs key. iOS devices stop receiving push until a key is saved again; registered devices are kept. Requires the integrations:manage scope and edit access to the workspace.
     *
     * Example:
     * ```php
     * $client->push->clearApnsCredentials();
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
     * @return ?ClearApnsCredentialsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function clearApnsCredentials(?array $options = null): ?ClearApnsCredentialsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/settings/ios",
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
                return ClearApnsCredentialsResponse::fromJson($json);
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
     * Removes the Firebase service account. Android devices stop receiving push until a key is uploaded again; registered devices are kept. Requires the integrations:manage scope and edit access to the workspace.
     *
     * Example:
     * ```php
     * $client->push->clearFcmCredentials();
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
     * @return ?ClearFcmCredentialsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function clearFcmCredentials(?array $options = null): ?ClearFcmCredentialsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/settings/android",
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
                return ClearFcmCredentialsResponse::fromJson($json);
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
     * Creates a push campaign draft. Content and audience can be set now or later. Requires the campaigns:write scope.
     *
     * Example:
     * ```php
     * $client->push->createPushCampaign(
     *     new CreatePushCampaignRequest([]),
     * );
     * ```
     *
     * @param CreatePushCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreatePushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createPushCampaign(CreatePushCampaignRequest $request = new CreatePushCampaignRequest(), ?array $options = null): ?CreatePushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns",
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
                return CreatePushCampaignResponse::fromJson($json);
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
     * Marks a device unsubscribed so it stops receiving push. The device can register again from your site or app. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->push->deletePushDevice(
     *     'deviceId',
     * );
     * ```
     *
     * @param string $deviceId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeletePushDeviceResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deletePushDevice(string $deviceId, ?array $options = null): ?DeletePushDeviceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/devices/{$deviceId}",
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
                return DeletePushDeviceResponse::fromJson($json);
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
     * Copies a push campaign's content and audience into a new draft. Requires the campaigns:write scope.
     *
     * Example:
     * ```php
     * $client->push->duplicatePushCampaign(
     *     'campaignId',
     *     new DuplicatePushCampaignRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param DuplicatePushCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DuplicatePushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function duplicatePushCampaign(string $campaignId, DuplicatePushCampaignRequest $request = new DuplicatePushCampaignRequest(), ?array $options = null): ?DuplicatePushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}/duplicate",
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
                return DuplicatePushCampaignResponse::fromJson($json);
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
     * Counts the contacts in an audience (audienceCount) and those with an active device on the selected platforms (eligibleCount). Email status does not affect push eligibility. Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->push->estimatePushCampaignRecipients(
     *     new EstimatePushCampaignRecipientsRequest([
     *         'targetLists' => [
     *             'key' => "value",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param EstimatePushCampaignRecipientsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?EstimatePushCampaignRecipientsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function estimatePushCampaignRecipients(EstimatePushCampaignRecipientsRequest $request, ?array $options = null): ?EstimatePushCampaignRecipientsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/estimate",
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
                return EstimatePushCampaignRecipientsResponse::fromJson($json);
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
     * Returns a push campaign's content, audience and status, plus delivery stats once it has started sending (null for drafts). Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->push->getPushCampaign(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetPushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getPushCampaign(string $campaignId, ?array $options = null): ?GetPushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}",
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
                return GetPushCampaignResponse::fromJson($json);
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
     * Returns delivery and engagement stats for a push campaign. Test sends are excluded. Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->push->getPushCampaignStats(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetPushCampaignStatsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getPushCampaignStats(string $campaignId, ?array $options = null): ?GetPushCampaignStatsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}/stats",
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
                return GetPushCampaignStatsResponse::fromJson($json);
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
     * Returns web push, APNs (iOS) and Firebase (Android) readiness, the last credential error for each platform, the default icon and active device counts. Secrets are never returned. Requires the account:read scope.
     *
     * Example:
     * ```php
     * $client->push->getPushSettings();
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
     * @return ?GetPushSettingsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getPushSettings(?array $options = null): ?GetPushSettingsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/settings",
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
                return GetPushSettingsResponse::fromJson($json);
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
     * Lists push campaigns, newest first. Push campaigns also appear in GET /campaigns with type push. Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->push->listPushCampaigns(
     *     new ListPushCampaignsRequest([]),
     * );
     * ```
     *
     * @param ListPushCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListPushCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listPushCampaigns(ListPushCampaignsRequest $request = new ListPushCampaignsRequest(), ?array $options = null): ?ListPushCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns",
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
                return ListPushCampaignsResponse::fromJson($json);
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
     * Lists registered browsers and app installs in a stable order; page with the returned cursor. Tokens are never returned in full. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->push->listPushDevices(
     *     new ListPushDevicesRequest([]),
     * );
     * ```
     *
     * @param ListPushDevicesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListPushDevicesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listPushDevices(ListPushDevicesRequest $request = new ListPushDevicesRequest(), ?array $options = null): ?ListPushDevicesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->cursor != null) {
            $query['cursor'] = $request->cursor;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->platform != null) {
            $query['platform'] = $request->platform;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->subscriberId != null) {
            $query['subscriberId'] = $request->subscriberId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/devices",
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
                return ListPushDevicesResponse::fromJson($json);
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
     * Registers or refreshes a device, typically from your app backend after the app receives its APNs or FCM token. Re-registering a known token reactivates it, refreshes its metadata and moves it to the given contact. An unknown email becomes a contact quietly (no lists, no contact_added sequences). Each contact keeps at most 20 active devices; the least recently seen are retired. Returns 201 for a new token and 200 for an existing one. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->push->registerPushDevice(
     *     new RegisterPushDeviceRequest([
     *         'platform' => RegisterPushDeviceRequestPlatform::Ios->value,
     *         'token' => 'token',
     *     ]),
     * );
     * ```
     *
     * @param RegisterPushDeviceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RegisterPushDeviceResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function registerPushDevice(RegisterPushDeviceRequest $request, ?array $options = null): ?RegisterPushDeviceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/devices",
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
                return RegisterPushDeviceResponse::fromJson($json);
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
     * Sends a draft or scheduled push campaign now, or schedules it when scheduledAt is a future ISO 8601 time. Requires content, an audience with at least one contact that has an active device, and at least one selected platform set up in push settings. The audience is re-evaluated when delivery starts. Requires the campaigns:send scope.
     *
     * Example:
     * ```php
     * $client->push->sendPushCampaign(
     *     'campaignId',
     *     new SendPushCampaignRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param SendPushCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SendPushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function sendPushCampaign(string $campaignId, SendPushCampaignRequest $request = new SendPushCampaignRequest(), ?array $options = null): ?SendPushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}/send",
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
                return SendPushCampaignResponse::fromJson($json);
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
     * Sends a real push to one device (deviceId) or to every active device of a contact (email or subscriberId). Provide title and/or body. Tests are excluded from stats and limited to 200 per company in a rolling 24-hour window. Requires the campaigns:send scope.
     *
     * Example:
     * ```php
     * $client->push->sendTestPush(
     *     new SendTestPushRequest([]),
     * );
     * ```
     *
     * @param SendTestPushRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SendTestPushResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function sendTestPush(SendTestPushRequest $request = new SendTestPushRequest(), ?array $options = null): ?SendTestPushResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/test",
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
                return SendTestPushResponse::fromJson($json);
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
     * Connects iOS push with an APNs auth key (.p8). The key is validated, encrypted at rest and never returned. Replacing the key clears the last credential error. Requires the integrations:manage scope and edit access to the workspace.
     *
     * Example:
     * ```php
     * $client->push->setApnsCredentials(
     *     new SetApnsCredentialsRequest([
     *         'bundleId' => 'com.example.app',
     *         'keyId' => 'ABC123DEFG',
     *         'privateKey' => 'privateKey',
     *         'teamId' => 'DEF123GHIJ',
     *     ]),
     * );
     * ```
     *
     * @param SetApnsCredentialsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SetApnsCredentialsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function setApnsCredentials(SetApnsCredentialsRequest $request, ?array $options = null): ?SetApnsCredentialsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/settings/ios",
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
                return SetApnsCredentialsResponse::fromJson($json);
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
     * Connects Android push with a Firebase service account key. The file is validated (it must be a service account with a private key; token_uri, when present, must be Google's), encrypted at rest and never returned. Requires the integrations:manage scope and edit access to the workspace.
     *
     * Example:
     * ```php
     * $client->push->setFcmCredentials(
     *     new SetFcmCredentialsRequest([
     *         'serviceAccount' => 'serviceAccount',
     *     ]),
     * );
     * ```
     *
     * @param SetFcmCredentialsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SetFcmCredentialsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function setFcmCredentials(SetFcmCredentialsRequest $request, ?array $options = null): ?SetFcmCredentialsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/settings/android",
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
                return SetFcmCredentialsResponse::fromJson($json);
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
     * Moves a scheduled push campaign back to draft. The queued send is discarded. Requires the campaigns:send scope.
     *
     * Example:
     * ```php
     * $client->push->unschedulePushCampaign(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UnschedulePushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function unschedulePushCampaign(string $campaignId, ?array $options = null): ?UnschedulePushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}/unschedule",
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
                return UnschedulePushCampaignResponse::fromJson($json);
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
     * Updates a draft or scheduled push campaign. Only the fields you pass change; content fields merge over the stored content. A scheduled campaign keeps its schedule and cannot be cleared to empty content. Requires the campaigns:write scope.
     *
     * Example:
     * ```php
     * $client->push->updatePushCampaign(
     *     'campaignId',
     *     new UpdatePushCampaignRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param UpdatePushCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdatePushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updatePushCampaign(string $campaignId, UpdatePushCampaignRequest $request = new UpdatePushCampaignRequest(), ?array $options = null): ?UpdatePushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}",
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
                return UpdatePushCampaignResponse::fromJson($json);
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
     * Enables or disables web push, or sets the default notification icon. The first enable generates the workspace's VAPID key pair; disabling keeps the keys so existing browser subscriptions remain valid when you enable again. Requires the integrations:manage scope and edit access to the workspace.
     *
     * Example:
     * ```php
     * $client->push->updateWebPushSettings(
     *     new UpdateWebPushSettingsRequest([]),
     * );
     * ```
     *
     * @param UpdateWebPushSettingsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateWebPushSettingsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateWebPushSettings(UpdateWebPushSettingsRequest $request = new UpdateWebPushSettingsRequest(), ?array $options = null): ?UpdateWebPushSettingsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/settings/web",
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
                return UpdateWebPushSettingsResponse::fromJson($json);
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
