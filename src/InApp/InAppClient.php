<?php

namespace Sequenzy\InApp;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\InApp\Requests\CreateInAppCampaignRequest;
use Sequenzy\InApp\Types\CreateInAppCampaignResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\InApp\Requests\CreateInAppPlacementRequest;
use Sequenzy\InApp\Types\CreateInAppPlacementResponse;
use Sequenzy\InApp\Types\DeleteInAppMessageResponse;
use Sequenzy\InApp\Types\DeleteInAppPlacementResponse;
use Sequenzy\InApp\Requests\DuplicateInAppCampaignRequest;
use Sequenzy\InApp\Types\DuplicateInAppCampaignResponse;
use Sequenzy\InApp\Requests\EstimateInAppCampaignRecipientsRequest;
use Sequenzy\InApp\Types\EstimateInAppCampaignRecipientsResponse;
use Sequenzy\InApp\Types\GetInAppCampaignResponse;
use Sequenzy\InApp\Types\GetInAppCampaignStatsResponse;
use Sequenzy\InApp\Types\GetInAppPlacementResponse;
use Sequenzy\InApp\Requests\GetInAppPlacementContentRequest;
use Sequenzy\InApp\Types\GetInAppPlacementContentResponse;
use Sequenzy\InApp\Types\GetInAppStepStatsResponse;
use Sequenzy\InApp\Requests\ListInAppCampaignsRequest;
use Sequenzy\InApp\Types\ListInAppCampaignsResponse;
use Sequenzy\InApp\Requests\ListInAppMessagesRequest;
use Sequenzy\InApp\Types\ListInAppMessagesResponse;
use Sequenzy\InApp\Types\ListInAppPlacementsResponse;
use Sequenzy\InApp\Types\ListInAppTemplatesResponse;
use Sequenzy\InApp\Requests\RecordInAppEventRequest;
use Sequenzy\InApp\Types\RecordInAppEventResponse;
use Sequenzy\InApp\Requests\SendInAppCampaignRequest;
use Sequenzy\InApp\Types\SendInAppCampaignResponse;
use Sequenzy\InApp\Types\StopInAppCampaignResponse;
use Sequenzy\InApp\Types\UnscheduleInAppCampaignResponse;
use Sequenzy\InApp\Requests\UpdateInAppCampaignRequest;
use Sequenzy\InApp\Types\UpdateInAppCampaignResponse;
use Sequenzy\InApp\Requests\UpdateInAppPlacementRequest;
use Sequenzy\InApp\Types\UpdateInAppPlacementResponse;
use Sequenzy\InApp\Requests\ValidateInAppHtmlRequest;
use Sequenzy\InApp\Types\ValidateInAppHtmlResponse;
use Sequenzy\InApp\Requests\WriteInAppCopyRequest;
use Sequenzy\InApp\Types\WriteInAppCopyResponse;

class InAppClient
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
     * Creates an in-app campaign draft, one in-app message or content card for an audience. The message, priority, end time and audience can be set now or later. Requires the campaigns:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->createInAppCampaign(
     *     new CreateInAppCampaignRequest([]),
     * );
     * ```
     *
     * @param CreateInAppCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateInAppCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createInAppCampaign(CreateInAppCampaignRequest $request = new CreateInAppCampaignRequest(), ?array $options = null): ?CreateInAppCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns",
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
                return CreateInAppCampaignResponse::fromJson($json);
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
     * Creates a placement, a slot in your app that shows in-app content inline. The key never changes. A workspace can have up to 50 placements. Requires the sequences:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->createInAppPlacement(
     *     new CreateInAppPlacementRequest([
     *         'key' => 'home_hero',
     *     ]),
     * );
     * ```
     *
     * @param CreateInAppPlacementRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateInAppPlacementResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createInAppPlacement(CreateInAppPlacementRequest $request, ?array $options = null): ?CreateInAppPlacementResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/placements",
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
                return CreateInAppPlacementResponse::fromJson($json);
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
     * Deletes an item so the contact's app stops showing it the next time it fetches the feed. Its engagement no longer counts in step stats. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->deleteInAppMessage(
     *     'messageId',
     * );
     * ```
     *
     * @param string $messageId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteInAppMessageResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteInAppMessage(string $messageId, ?array $options = null): ?DeleteInAppMessageResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/messages/{$messageId}",
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
                return DeleteInAppMessageResponse::fromJson($json);
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
     * Deletes a placement. Its slots collapse in your app on the next refresh, and in-app steps that target it skip contacts until a placement with the same key exists again. Items already created stay in contact history and never show again, even under a placement created later with the same key. Requires the sequences:delete scope.
     *
     * Example:
     * ```php
     * $client->inApp->deleteInAppPlacement(
     *     'key',
     * );
     * ```
     *
     * @param string $key The placement key, e.g. home_hero.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteInAppPlacementResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteInAppPlacement(string $key, ?array $options = null): ?DeleteInAppPlacementResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/placements/{$key}",
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
                return DeleteInAppPlacementResponse::fromJson($json);
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
     * Copies an in-app campaign's message, priority, audience and labels into a new draft. An end time that has passed is not copied. Requires the campaigns:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->duplicateInAppCampaign(
     *     'campaignId',
     *     new DuplicateInAppCampaignRequest([]),
     * );
     * ```
     *
     * @param string $campaignId
     * @param DuplicateInAppCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DuplicateInAppCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function duplicateInAppCampaign(string $campaignId, DuplicateInAppCampaignRequest $request = new DuplicateInAppCampaignRequest(), ?array $options = null): ?DuplicateInAppCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/{$campaignId}/duplicate",
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
                return DuplicateInAppCampaignResponse::fromJson($json);
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
     * Counts the contacts who match an audience now, and how many of them are known to have your app connected. Contacts who join the audience while the campaign is live get it too. Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->estimateInAppCampaignRecipients(
     *     new EstimateInAppCampaignRecipientsRequest([
     *         'targetLists' => [
     *             'key' => "value",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param EstimateInAppCampaignRecipientsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?EstimateInAppCampaignRecipientsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function estimateInAppCampaignRecipients(EstimateInAppCampaignRecipientsRequest $request, ?array $options = null): ?EstimateInAppCampaignRecipientsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/estimate",
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
                return EstimateInAppCampaignRecipientsResponse::fromJson($json);
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
     * Returns an in-app campaign's message, audience, priority, schedule, end time and state, plus reach and engagement once it has launched (null for drafts and scheduled campaigns). Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->getInAppCampaign(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetInAppCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInAppCampaign(string $campaignId, ?array $options = null): ?GetInAppCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/{$campaignId}",
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
                return GetInAppCampaignResponse::fromJson($json);
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
     * Returns reach and engagement for an in-app campaign, counted from the messages it delivered. Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->getInAppCampaignStats(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetInAppCampaignStatsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInAppCampaignStats(string $campaignId, ?array $options = null): ?GetInAppCampaignStatsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/{$campaignId}/stats",
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
                return GetInAppCampaignStatsResponse::fromJson($json);
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
     * One placement with its all-time item counts. Requires the sequences:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->getInAppPlacement(
     *     'key',
     * );
     * ```
     *
     * @param string $key The placement key, e.g. home_hero.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetInAppPlacementResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInAppPlacement(string $key, ?array $options = null): ?GetInAppPlacementResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/placements/{$key}",
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
                return GetInAppPlacementResponse::fromJson($json);
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
     * What each requested placement shows one contact now: their highest-priority open placement item (ties go to the newest), or null so your app collapses the slot. Keys the workspace has not defined always return null. Reading marks nothing displayed. Identify the contact with email, externalId or subscriberId. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->getInAppPlacementContent(
     *     new GetInAppPlacementContentRequest([
     *         'placements' => 'home_hero,checkout_upsell',
     *     ]),
     * );
     * ```
     *
     * @param GetInAppPlacementContentRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetInAppPlacementContentResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInAppPlacementContent(GetInAppPlacementContentRequest $request, ?array $options = null): ?GetInAppPlacementContentResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['placements'] = $request->placements;
        if ($request->actions != null) {
            $query['actions'] = $request->actions;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->externalId != null) {
            $query['externalId'] = $request->externalId;
        }
        if ($request->subscriberId != null) {
            $query['subscriberId'] = $request->subscriberId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/placement-feed",
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
                return GetInAppPlacementContentResponse::fromJson($json);
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
     * Created, displayed, clicked and dismissed counts for one in_app sequence step, plus push primer permission results. Requires the sequences:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->getInAppStepStats(
     *     'stepId',
     * );
     * ```
     *
     * @param string $stepId The step's node ID from Get Sequence.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetInAppStepStatsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInAppStepStats(string $stepId, ?array $options = null): ?GetInAppStepStatsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/steps/{$stepId}/stats",
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
                return GetInAppStepStatsResponse::fromJson($json);
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
     * Lists in-app campaigns, newest first. Each carries its stored status and a state (draft, scheduled, live, ended, stopped). In-app campaigns also appear in GET /campaigns with type in_app. Requires the campaigns:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->listInAppCampaigns(
     *     new ListInAppCampaignsRequest([]),
     * );
     * ```
     *
     * @param ListInAppCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListInAppCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listInAppCampaigns(ListInAppCampaignsRequest $request = new ListInAppCampaignsRequest(), ?array $options = null): ?ListInAppCampaignsResponse
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
                    path: "in-app/campaigns",
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
                return ListInAppCampaignsResponse::fromJson($json);
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
     * Lists a contact's in-app messages and content cards, created by in_app sequence steps and in-app campaigns. With status open (default) it first delivers live in-app campaigns the contact qualifies for, as the app's own feed does, then returns what the app should show now: messages not yet displayed, clicked or dismissed, and cards not dismissed, excluding expired items, messages first, then higher campaign priority, then pinned cards, then newest. With status all it returns history, newest first. Identify the contact with email, externalId or subscriberId. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->listInAppMessages(
     *     new ListInAppMessagesRequest([
     *         'actions' => 'request_push_permission',
     *     ]),
     * );
     * ```
     *
     * @param ListInAppMessagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListInAppMessagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listInAppMessages(ListInAppMessagesRequest $request = new ListInAppMessagesRequest(), ?array $options = null): ?ListInAppMessagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->actions != null) {
            $query['actions'] = $request->actions;
        }
        if ($request->deliver != null) {
            $query['deliver'] = $request->deliver;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->externalId != null) {
            $query['externalId'] = $request->externalId;
        }
        if ($request->formats != null) {
            $query['formats'] = $request->formats;
        }
        if ($request->kind != null) {
            $query['kind'] = $request->kind;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
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
                    path: "in-app/messages",
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
                return ListInAppMessagesResponse::fromJson($json);
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
     * Lists the workspace's placements, sorted by name, each with all-time item counts. Requires the sequences:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->listInAppPlacements();
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
     * @return ?ListInAppPlacementsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listInAppPlacements(?array $options = null): ?ListInAppPlacementsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/placements",
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
                return ListInAppPlacementsResponse::fromJson($json);
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
     * Built-in starting points for in_app sequence steps. Each config is a complete step without a label; link buttons have no url until you add one. Requires the sequences:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->listInAppTemplates();
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
     * @return ?ListInAppTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listInAppTemplates(?array $options = null): ?ListInAppTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/templates",
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
                return ListInAppTemplatesResponse::fromJson($json);
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
     * Records that the app displayed, clicked, dismissed or read an item. The first report of each type sets its timestamp; repeats change nothing except clickCount, and recorded is false. Clicks, dismissals and reads also mark the item displayed. Messages leave the open feed once displayed, clicked or dismissed; cards once dismissed. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->recordInAppEvent(
     *     'messageId',
     *     new RecordInAppEventRequest([
     *         'type' => RecordInAppEventRequestType::Displayed->value,
     *     ]),
     * );
     * ```
     *
     * @param string $messageId
     * @param RecordInAppEventRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RecordInAppEventResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function recordInAppEvent(string $messageId, RecordInAppEventRequest $request, ?array $options = null): ?RecordInAppEventResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/messages/{$messageId}/events",
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
                return RecordInAppEventResponse::fromJson($json);
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
     * Launches a draft or scheduled in-app campaign now, or schedules it when scheduledAt is a future ISO 8601 time. Launching writes nothing per contact. While the campaign is live, each contact in the audience gets the message the first time their app fetches its feed (SDK feed, browser feed or GET /in-app/messages), including contacts who join the audience later or open the app days later. Callers that cannot render the message's format or button actions do not use it up. Requires a message, an audience and an end time after the start. Requires the campaigns:send scope.
     *
     * Example:
     * ```php
     * $client->inApp->sendInAppCampaign(
     *     'campaignId',
     *     new SendInAppCampaignRequest([]),
     * );
     * ```
     *
     * @param string $campaignId
     * @param SendInAppCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SendInAppCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function sendInAppCampaign(string $campaignId, SendInAppCampaignRequest $request = new SendInAppCampaignRequest(), ?array $options = null): ?SendInAppCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/{$campaignId}/send",
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
                return SendInAppCampaignResponse::fromJson($json);
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
     * Stops a scheduled or live in-app campaign. Nobody new gets it, and it leaves every feed that still has it, including cards contacts have seen but not dismissed. Stats are kept. Stopping is final; duplicate the campaign to run it again. Stopping a stopped campaign succeeds and ends its items again; a campaign past its end time has already ended (409). POST /campaigns/{campaignId}/cancel does the same for in-app campaigns. Requires the campaigns:send scope.
     *
     * Example:
     * ```php
     * $client->inApp->stopInAppCampaign(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?StopInAppCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function stopInAppCampaign(string $campaignId, ?array $options = null): ?StopInAppCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/{$campaignId}/stop",
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
                return StopInAppCampaignResponse::fromJson($json);
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
     * Moves a scheduled in-app campaign back to draft. Requires the campaigns:send scope.
     *
     * Example:
     * ```php
     * $client->inApp->unscheduleInAppCampaign(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UnscheduleInAppCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function unscheduleInAppCampaign(string $campaignId, ?array $options = null): ?UnscheduleInAppCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/{$campaignId}/unschedule",
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
                return UnscheduleInAppCampaignResponse::fromJson($json);
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
     * Updates a draft or scheduled in-app campaign. Only the fields you pass change; message fields are merged over the stored message. Clear imageUrl, position, imagePlacement, expiresAfterDays, style, html or showCloseButton with null, eyebrow with "", buttons with [] and data with {}. A scheduled campaign must stay launchable. Live, ended and stopped campaigns cannot be edited; stop and duplicate them instead. Requires the campaigns:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->updateInAppCampaign(
     *     'campaignId',
     *     new UpdateInAppCampaignRequest([]),
     * );
     * ```
     *
     * @param string $campaignId
     * @param UpdateInAppCampaignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateInAppCampaignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateInAppCampaign(string $campaignId, UpdateInAppCampaignRequest $request = new UpdateInAppCampaignRequest(), ?array $options = null): ?UpdateInAppCampaignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/campaigns/{$campaignId}",
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
                return UpdateInAppCampaignResponse::fromJson($json);
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
     * Changes a placement's name, description or size hints; null clears a size hint. The key cannot change. Requires the sequences:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->updateInAppPlacement(
     *     'key',
     *     new UpdateInAppPlacementRequest([
     *         'body' => new InAppPlacementInput([]),
     *     ]),
     * );
     * ```
     *
     * @param string $key The placement key, e.g. home_hero.
     * @param UpdateInAppPlacementRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateInAppPlacementResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateInAppPlacement(string $key, UpdateInAppPlacementRequest $request, ?array $options = null): ?UpdateInAppPlacementResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/placements/{$key}",
                    method: HttpMethod::PATCH,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return UpdateInAppPlacementResponse::fromJson($json);
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
     * Checks a custom HTML in-app message document without saving anything: size against the 100 KB limit, Braze Liquid converted to Sequenzy merge tags, script hosts a website CSP must allow, whether it closes itself, warnings and blocking errors. Requires the sequences:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->validateInAppHtml(
     *     new ValidateInAppHtmlRequest([
     *         'html' => 'html',
     *     ]),
     * );
     * ```
     *
     * @param ValidateInAppHtmlRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ValidateInAppHtmlResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function validateInAppHtml(ValidateInAppHtmlRequest $request, ?array $options = null): ?ValidateInAppHtmlResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/html/validate",
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
                return ValidateInAppHtmlResponse::fromJson($json);
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
     * Writes an in-app message's eyebrow, title, message and button labels with AI from a brief. Nothing is saved. Requires the sequences:write scope; limited to 20 requests a minute per workspace.
     *
     * Example:
     * ```php
     * $client->inApp->writeInAppCopy(
     *     new WriteInAppCopyRequest([
     *         'brief' => 'brief',
     *     ]),
     * );
     * ```
     *
     * @param WriteInAppCopyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?WriteInAppCopyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function writeInAppCopy(WriteInAppCopyRequest $request, ?array $options = null): ?WriteInAppCopyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/copy",
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
                return WriteInAppCopyResponse::fromJson($json);
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
