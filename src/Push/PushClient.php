<?php

namespace Sequenzy\Push;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Push\Requests\AddPushImportRowsRequest;
use Sequenzy\Push\Types\AddPushImportRowsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Push\Types\CancelPushCampaignResponse;
use Sequenzy\Types\PushImportResponse;
use Sequenzy\Push\Types\ClearApnsCredentialsResponse;
use Sequenzy\Push\Types\ClearFcmCredentialsResponse;
use Sequenzy\Push\Requests\CreatePushCampaignRequest;
use Sequenzy\Push\Types\CreatePushCampaignResponse;
use Sequenzy\Push\Requests\CreatePushImportRequest;
use Sequenzy\Push\Types\DeletePushDeviceResponse;
use Sequenzy\Push\Requests\DuplicatePushCampaignRequest;
use Sequenzy\Push\Types\DuplicatePushCampaignResponse;
use Sequenzy\Push\Requests\EndLiveActivityRequest;
use Sequenzy\Types\LiveActivityDispatch;
use Sequenzy\Push\Requests\EstimatePushCampaignRecipientsRequest;
use Sequenzy\Push\Types\EstimatePushCampaignRecipientsResponse;
use Sequenzy\Push\Types\GetPushCampaignResponse;
use Sequenzy\Push\Types\GetPushCampaignStatsResponse;
use Sequenzy\Push\Requests\GetPushImportPreflightRequest;
use Sequenzy\Push\Types\GetPushImportPreflightResponse;
use Sequenzy\Push\Types\GetPushSettingsResponse;
use Sequenzy\Push\Requests\ListLiveActivitiesRequest;
use Sequenzy\Push\Types\ListLiveActivitiesResponse;
use Sequenzy\Push\Requests\ListPushCampaignsRequest;
use Sequenzy\Push\Types\ListPushCampaignsResponse;
use Sequenzy\Push\Requests\ListPushDevicesRequest;
use Sequenzy\Push\Types\ListPushDevicesResponse;
use Sequenzy\Push\Requests\ListPushImportsRequest;
use Sequenzy\Push\Types\ListPushImportsResponse;
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
use Sequenzy\Push\Requests\StartLiveActivityRequest;
use Sequenzy\Push\Requests\TranslatePushCampaignRequest;
use Sequenzy\Push\Types\TranslatePushCampaignResponse;
use Sequenzy\Push\Requests\TranslatePushContentRequest;
use Sequenzy\Push\Types\TranslatePushContentResponse;
use Sequenzy\Push\Types\UnschedulePushCampaignResponse;
use Sequenzy\Push\Requests\UpdateLiveActivityRequest;
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
     * Stages another part of a CSV file (at most 5 MB, header row required) on a draft csv import. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->push->addPushImportRows(
     *     'importId',
     *     new AddPushImportRowsRequest([
     *         'csv' => 'csv',
     *     ]),
     * );
     * ```
     *
     * @param string $importId
     * @param AddPushImportRowsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AddPushImportRowsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function addPushImportRows(string $importId, AddPushImportRowsRequest $request, ?array $options = null): ?AddPushImportRowsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/imports/{$importId}/rows",
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
                return AddPushImportRowsResponse::fromJson($json);
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
     * Stops an import, or discards a draft or failed one. Devices already imported stay; staged rows and the stored source key are deleted. Canceling a canceled import returns it unchanged. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->push->cancelPushImport(
     *     'importId',
     * );
     * ```
     *
     * @param string $importId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PushImportResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function cancelPushImport(string $importId, ?array $options = null): ?PushImportResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/imports/{$importId}/cancel",
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
                return PushImportResponse::fromJson($json);
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
     * Creates a draft import of iOS (APNs) and Android (FCM) devices from OneSignal, Braze, Customer.io or a CSV, with its push settings warnings. Nothing is read from the source until the import is started. Web push subscriptions are never imported. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->push->createPushImport(
     *     new CreatePushImportRequest([
     *         'source' => CreatePushImportRequestSource::Onesignal->value,
     *     ]),
     * );
     * ```
     *
     * @param CreatePushImportRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PushImportResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createPushImport(CreatePushImportRequest $request, ?array $options = null): ?PushImportResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/imports",
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
                return PushImportResponse::fromJson($json);
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
     * Ends the contact's activity on every device running it, iOS and Android, or with broadcast true on every signed-in device running the activityId. Tokens are marked ended as APNs or FCM accepts the push, so an end that failed can be sent again. Without dismissalDate iOS keeps an ended activity on the Lock Screen, and Android keeps the final notification, for up to four hours. Requires the transactional:send scope; broadcast also requires campaigns:send.
     *
     * Example:
     * ```php
     * $client->push->endLiveActivity(
     *     new EndLiveActivityRequest([
     *         'activityId' => 'order-1234',
     *         'contentState' => [
     *             'key' => "value",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param EndLiveActivityRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LiveActivityDispatch
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function endLiveActivity(EndLiveActivityRequest $request, ?array $options = null): ?LiveActivityDispatch
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/live-activities/end",
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
                return LiveActivityDispatch::fromJson($json);
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
     * Status, progress, counts, skip and invalid reasons, and warnings. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->push->getPushImport(
     *     'importId',
     * );
     * ```
     *
     * @param string $importId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PushImportResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getPushImport(string $importId, ?array $options = null): ?PushImportResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/imports/{$importId}",
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
                return PushImportResponse::fromJson($json);
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
     * Warns when APNs or Firebase is not set up (imported tokens only work with the same bundle ID, Apple team and Firebase project the app used before) and notes that web push is not imported. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->push->getPushImportPreflight(
     *     new GetPushImportPreflightRequest([
     *         'source' => GetPushImportPreflightRequestSource::Onesignal->value,
     *     ]),
     * );
     * ```
     *
     * @param GetPushImportPreflightRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetPushImportPreflightResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getPushImportPreflight(GetPushImportPreflightRequest $request, ?array $options = null): ?GetPushImportPreflightResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['source'] = $request->source;
        if ($request->platforms != null) {
            $query['platforms'] = $request->platforms;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/imports/preflight",
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
                return GetPushImportPreflightResponse::fromJson($json);
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
     * Lists ActivityKit tokens the Sequenzy iOS SDK reported and Android Live Update tokens the Sequenzy Android SDK reported, with a summary per activity type (for the contact when email or subscriberId is given, and for the platform when platform is given). push_to_start tokens can start an activity of their type; update tokens address one running activity. Tokens are masked. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->push->listLiveActivities(
     *     new ListLiveActivitiesRequest([]),
     * );
     * ```
     *
     * @param ListLiveActivitiesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListLiveActivitiesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listLiveActivities(ListLiveActivitiesRequest $request = new ListLiveActivitiesRequest(), ?array $options = null): ?ListLiveActivitiesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->activityId != null) {
            $query['activityId'] = $request->activityId;
        }
        if ($request->activityType != null) {
            $query['activityType'] = $request->activityType;
        }
        if ($request->cursor != null) {
            $query['cursor'] = $request->cursor;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->kind != null) {
            $query['kind'] = $request->kind;
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
                    path: "push/live-activities",
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
                return ListLiveActivitiesResponse::fromJson($json);
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
     * Recent push subscription imports, newest first, with progress and counts. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->push->listPushImports(
     *     new ListPushImportsRequest([]),
     * );
     * ```
     *
     * @param ListPushImportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListPushImportsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listPushImports(ListPushImportsRequest $request = new ListPushImportsRequest(), ?array $options = null): ?ListPushImportsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/imports",
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
                return ListPushImportsResponse::fromJson($json);
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
     * Sends a draft or scheduled push campaign now, or schedules it when scheduledAt is a future ISO 8601 time. Requires content, an audience with at least one contact that has an active device, and at least one selected platform set up in push settings. The audience is re-evaluated when delivery starts. Optionally deliver in each contact's local time (sendInRecipientTimezone with scheduledAt and scheduledTimezone) or at each contact's optimal hour (sendTimeOptimization); omitted timing fields keep the values saved on the campaign. Push campaigns have no spreadOverHours. Requires the campaigns:send scope.
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
     * Starts a Live Activity remotely on every device that reported a push-to-start token for activityType, on iOS 17.2+ through APNs and as an Android Live Update through FCM on apps that observe the same type with the Sequenzy Android SDK (promoted on Android 16, an ongoing notification on earlier versions). Target one contact with email or subscriberId, or everyone in a segment, list or tag with exactly one of segmentId, listId or tag (up to 100,000 devices on platforms with push credentials; contacts the app signed in with Sequenzy.identify, whatever their email status). When email or subscriberId is present, segmentId, listId and tag are ignored. All copies share the activityId, so one update or end with broadcast true reaches every device running it. Only platforms with push credentials are sent to; the request fails with 400 when neither APNs nor FCM is set up. Sequenzy adds sequenzy.activityId to the attributes so the iOS SDK can report the new activity's update token under your id. Returns 202 with tokenCount 0, sending nothing, when no device can start it. Calling it again starts another copy. Requires the transactional:send scope; a segment, list or tag also requires campaigns:send.
     *
     * Example:
     * ```php
     * $client->push->startLiveActivity(
     *     new StartLiveActivityRequest([
     *         'activityId' => 'order-1234',
     *         'activityType' => 'DeliveryAttributes',
     *         'alert' => new LiveActivityAlert([]),
     *         'contentState' => [
     *             'minutesAway' => 8,
     *             'status' => "out_for_delivery",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param StartLiveActivityRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LiveActivityDispatch
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function startLiveActivity(StartLiveActivityRequest $request, ?array $options = null): ?LiveActivityDispatch
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/live-activities/start",
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
                return LiveActivityDispatch::fromJson($json);
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
     * Starts a draft, or resumes a failed or stalled import from its last checkpoint. The import runs in the background; poll GET /push/imports/{importId}. Starting a running import returns it unchanged. One import runs per workspace at a time. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->push->startPushImport(
     *     'importId',
     * );
     * ```
     *
     * @param string $importId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PushImportResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function startPushImport(string $importId, ?array $options = null): ?PushImportResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/imports/{$importId}/start",
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
                return PushImportResponse::fromJson($json);
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
     * Translates a draft or scheduled push campaign's title and message with AI into the workspace's languages (Settings > Localization) and saves the versions. By default it translates languages with no version and AI versions whose main copy changed since; versions a person wrote are kept unless overwrite is true. Merge tags are kept exactly and their fallback text is translated. Runs inline (a few seconds). The save is skipped with 409 if the campaign changed while translating. Requires the campaigns:write scope.
     *
     * Example:
     * ```php
     * $client->push->translatePushCampaign(
     *     'campaignId',
     *     new TranslatePushCampaignRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Push campaign ID.
     * @param TranslatePushCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TranslatePushCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function translatePushCampaign(string $campaignId, TranslatePushCampaignRequest $request = new TranslatePushCampaignRequest(), ?array $options = null): ?TranslatePushCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/campaigns/{$campaignId}/translate",
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
                return TranslatePushCampaignResponse::fromJson($json);
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
     * Translates a push title and message with AI into the workspace's languages and returns the versions without saving anything. Use the result as a sequence push step's localizations (nodeUpdates changes.localizations) or a push campaign's. Pass existing versions in localizations to keep them; the same rules as Translate a push campaign decide which languages are translated. Requires the templates:write scope, like the other content generation endpoints.
     *
     * Example:
     * ```php
     * $client->push->translatePushContent(
     *     new TranslatePushContentRequest([]),
     * );
     * ```
     *
     * @param TranslatePushContentRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TranslatePushContentResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function translatePushContent(TranslatePushContentRequest $request = new TranslatePushContentRequest(), ?array $options = null): ?TranslatePushContentResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/translate",
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
                return TranslatePushContentResponse::fromJson($json);
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
     * Sends new content state to every running copy of the contact's activity (one per device that reported an update token, iOS and Android), or with broadcast true to every signed-in device running the activityId, such as an activity started for a segment, list or tag. Each request carries a fixed timestamp, so a retried or late delivery never replaces newer content on either platform. Returns tokenCount 0 when no running copy has reported a token. Requires the transactional:send scope; broadcast also requires campaigns:send.
     *
     * Example:
     * ```php
     * $client->push->updateLiveActivity(
     *     new UpdateLiveActivityRequest([
     *         'activityId' => 'order-1234',
     *         'contentState' => [
     *             'minutesAway' => 8,
     *             'status' => "out_for_delivery",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param UpdateLiveActivityRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LiveActivityDispatch
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateLiveActivity(UpdateLiveActivityRequest $request, ?array $options = null): ?LiveActivityDispatch
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "push/live-activities/update",
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
                return LiveActivityDispatch::fromJson($json);
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
     * Updates a draft or scheduled push campaign. Only the fields you pass change; content fields merge over the stored content. A scheduled campaign keeps its schedule and cannot be cleared to empty content. Delivery timing (sendInRecipientTimezone, scheduledTimezone, sendTimeOptimization, sendTimeWindowHours) saves on drafts; changing it on a scheduled campaign returns 409, so reschedule with the send endpoint instead. Requires the campaigns:write scope.
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
