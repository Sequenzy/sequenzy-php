<?php

namespace Sequenzy\Campaigns;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Campaigns\Types\CancelCampaignsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Campaigns\Requests\CreateCampaignsRequest;
use Sequenzy\Campaigns\Types\CreateCampaignsResponse;
use Sequenzy\Campaigns\Requests\CreateGoalCampaignsRequest;
use Sequenzy\Campaigns\Types\CreateGoalCampaignsResponse;
use Sequenzy\Campaigns\Types\CreateShareLinkCampaignsResponse;
use Sequenzy\Campaigns\Types\DeleteCampaignsResponse;
use Sequenzy\Campaigns\Types\DeleteGoalCampaignsResponse;
use Sequenzy\Campaigns\Requests\DuplicateCampaignsRequest;
use Sequenzy\Campaigns\Types\DuplicateCampaignsResponse;
use Sequenzy\Campaigns\Types\GetCampaignsResponse;
use Sequenzy\Campaigns\Types\GetAudienceCampaignsResponse;
use Sequenzy\Campaigns\Requests\ListCampaignsRequest;
use Sequenzy\Campaigns\Types\ListCampaignsResponse;
use Sequenzy\Campaigns\Types\ListGoalsCampaignsResponse;
use Sequenzy\Campaigns\Types\PauseCampaignsResponse;
use Sequenzy\Campaigns\Requests\PreviewComputedDataCampaignsRequest;
use Sequenzy\Campaigns\Types\PreviewComputedDataCampaignsResponse;
use Sequenzy\Campaigns\Requests\RenderCampaignsRequest;
use Sequenzy\Types\RenderEmailResponse;
use Sequenzy\Campaigns\Types\ResendToNonOpenersCampaignsResponse;
use Sequenzy\Campaigns\Requests\ResumeCampaignsRequest;
use Sequenzy\Campaigns\Types\ResumeCampaignsResponse;
use Sequenzy\Campaigns\Types\RevokeShareLinkCampaignsResponse;
use Sequenzy\Campaigns\Requests\ScheduleCampaignsRequest;
use Sequenzy\Campaigns\Types\ScheduleCampaignsResponse;
use Sequenzy\Campaigns\Requests\SendTestCampaignsRequest;
use Sequenzy\Campaigns\Types\SendTestCampaignsResponse;
use Sequenzy\Campaigns\Types\UnscheduleCampaignsResponse;
use Sequenzy\Campaigns\Requests\UpdateCampaignsRequest;
use Sequenzy\Campaigns\Types\UpdateCampaignsResponse;
use Sequenzy\Campaigns\Requests\UpdateGoalCampaignsRequest;
use Sequenzy\Campaigns\Types\UpdateGoalCampaignsResponse;

class CampaignsClient
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
     * Cancels a sending, paused, scheduled, waiting_approval, or rejected campaign and removes any pending send jobs.
     *
     * Example:
     * ```php
     * $client->campaigns->cancel(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CancelCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function cancel(string $campaignId, ?array $options = null): ?CancelCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/cancel",
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
                return CancelCampaignsResponse::fromJson($json);
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
     * Creates a campaign and linked email from at most one of prompt, HTML, Sequenzy blocks, or an existing template. Omit all content sources to create an empty draft. Optional From/Reply-To inputs create or select profiles; From addresses require a verified sending domain. Defaults to draft. Use status `sent` only to archive an imported/already-sent campaign. Marketer account keys must choose existing sender and Reply-To profiles; requests requiring new profiles return 400 before creating profiles, labels, or campaign/sequence changes, including nested steps and branches.
     *
     * Example:
     * ```php
     * $client->campaigns->create(
     *     new CreateCampaignsRequest([
     *         'html' => '<p>Hello there!</p>',
     *         'labels' => [
     *             'edm',
     *             'api',
     *         ],
     *         'name' => 'April Launch',
     *         'preheaderText' => 'A short preview for the inbox',
     *         'subject' => 'A quick update',
     *     ]),
     * );
     * ```
     *
     * @param CreateCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateCampaignsRequest $request, ?array $options = null): ?CreateCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns",
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
                return CreateCampaignsResponse::fromJson($json);
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
     * Creates an event, subscriber-attribute, or tag-applied conversion goal on one email campaign. SMS campaigns are not supported. The attribution window defaults to 168 hours when omitted.
     *
     * Example:
     * ```php
     * $client->campaigns->createGoal(
     *     'campaignId',
     *     new CreateGoalCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId
     * @param CreateGoalCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateGoalCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createGoal(string $campaignId, CreateGoalCampaignsRequest $request = new CreateGoalCampaignsRequest(), ?array $options = null): ?CreateGoalCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/goals",
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
                return CreateGoalCampaignsResponse::fromJson($json);
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
     * Creates (or fetches) the campaign's public view-in-browser link. The hosted page renders an anonymized copy - sample contact, inert unsubscribe link, no open/click tracking - so the URL is safe to forward to anyone. Idempotent - an already-active link is returned with created=false instead of being rotated. Email campaigns only.
     *
     * Example:
     * ```php
     * $client->campaigns->createShareLink(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateShareLinkCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createShareLink(string $campaignId, ?array $options = null): ?CreateShareLinkCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/share-link",
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
                return CreateShareLinkCampaignsResponse::fromJson($json);
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
     * Permanently deletes a campaign. Active campaigns (sending, scheduled, or paused) must be cancelled first.
     *
     * Example:
     * ```php
     * $client->campaigns->delete(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $campaignId, ?array $options = null): ?DeleteCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}",
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
                return DeleteCampaignsResponse::fromJson($json);
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
     * Permanently removes a conversion goal from the campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->deleteGoal(
     *     'campaignId',
     *     'goalId',
     * );
     * ```
     *
     * @param string $campaignId
     * @param string $goalId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteGoalCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteGoal(string $campaignId, string $goalId, ?array $options = null): ?DeleteGoalCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/goals/{$goalId}",
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
                return DeleteGoalCampaignsResponse::fromJson($json);
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
     * Creates a draft copy of a campaign. Optionally copies the campaign's A/B test or duplicates a single variant as a plain campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->duplicate(
     *     'campaignId',
     *     new DuplicateCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param DuplicateCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DuplicateCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function duplicate(string $campaignId, DuplicateCampaignsRequest $request = new DuplicateCampaignsRequest(), ?array $options = null): ?DuplicateCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/duplicate",
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
                return DuplicateCampaignsResponse::fromJson($json);
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
     * Returns one campaign with its email blocks, campaign data, reply-to profile, and schedule timestamps. Poll this to follow a campaign held in waiting_approval: on approval the status returns to scheduled (or sending, if the scheduled time already passed), and on rejection it becomes rejected with reviewer feedback in rejectionComment.
     *
     * Example:
     * ```php
     * $client->campaigns->get(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $campaignId, ?array $options = null): ?GetCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}",
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
                return GetCampaignsResponse::fromJson($json);
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
     * Resolves the campaign's stored targeting into named lists and segments and returns a recipient count computed at read time. When audience.isUnset is true the campaign has no targeting and scheduling sends to every active subscriber.
     *
     * Example:
     * ```php
     * $client->campaigns->getAudience(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetAudienceCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getAudience(string $campaignId, ?array $options = null): ?GetAudienceCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/audience",
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
                return GetAudienceCampaignsResponse::fromJson($json);
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
     * Lists campaigns for the authenticated company, optionally filtered by status or label. Each item includes delivery pacing (sendTimeOptimization, sendTimeWindowHours, spreadOverHours, sendInRecipientTimezone, scheduledTimezone) so a company-wide STO audit does not need one getCampaign call each. STO is campaign-only; sequences use sendingWindow.
     *
     * Example:
     * ```php
     * $client->campaigns->list(
     *     new ListCampaignsRequest([]),
     * );
     * ```
     *
     * @param ListCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListCampaignsRequest $request = new ListCampaignsRequest(), ?array $options = null): ?ListCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->label != null) {
            $query['label'] = $request->label;
        }
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
                    path: "campaigns",
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
                return ListCampaignsResponse::fromJson($json);
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
     * Lists the conversion goals attached to an email campaign. SMS campaigns are not supported.
     *
     * Example:
     * ```php
     * $client->campaigns->listGoals(
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
     * @return ?ListGoalsCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listGoals(string $campaignId, ?array $options = null): ?ListGoalsCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/goals",
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
                return ListGoalsCampaignsResponse::fromJson($json);
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
     * Pauses a campaign that is currently sending. In-progress chunk workers stop and remaining recipients are held until resume.
     *
     * Example:
     * ```php
     * $client->campaigns->pause(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PauseCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function pause(string $campaignId, ?array $options = null): ?PauseCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/pause",
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
                return PauseCampaignsResponse::fromJson($json);
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
     * Preview the per-recipient lists that a campaign computes from campaign data.
     *
     * Example:
     * ```php
     * $client->campaigns->previewComputedData(
     *     'campaignId',
     *     new PreviewComputedDataCampaignsRequest([
     *         'subscriber' => new PreviewComputedDataCampaignsRequestSubscriber([
     *             'customAttributes' => [
     *                 'interests' => [
     *                     "theatre",
     *                     "arts",
     *                 ],
     *                 'region' => "Auckland",
     *             ],
     *             'email' => 'anna@example.com',
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param PreviewComputedDataCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PreviewComputedDataCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function previewComputedData(string $campaignId, PreviewComputedDataCampaignsRequest $request = new PreviewComputedDataCampaignsRequest(), ?array $options = null): ?PreviewComputedDataCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/preview-computed-data",
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
                return PreviewComputedDataCampaignsResponse::fromJson($json);
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
     * Render a campaign to the exact email-safe HTML that would be sent, for embedding a visual preview. Read-only: this never sends or modifies anything, and uses POST only so personalization input can travel in a request body.
     *
     * Example:
     * ```php
     * $client->campaigns->render(
     *     'campaignId',
     *     new RenderCampaignsRequest([
     *         'body' => new RenderEmailRequest([]),
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param RenderCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RenderEmailResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function render(string $campaignId, RenderCampaignsRequest $request, ?array $options = null): ?RenderEmailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/render",
                    method: HttpMethod::POST,
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
                return RenderEmailResponse::fromJson($json);
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
     * Creates a draft that resends a sent campaign to everyone in the same audience who didn't open it. Reuses the original audience plus a "didn't open this campaign" rule. Only available 6 hours after the campaign finishes sending, and never for imported already-sent campaigns, which have no opens in Sequenzy. The draft must be scheduled or sent separately. Every audience format stores excludedCampaignOpenerIds that manual additions cannot override, preserving inherited exclusions on repeated resends. Audience membership is evaluated live. Recreate older drafts missing this metadata from the original campaign and review before scheduling.
     *
     * Example:
     * ```php
     * $client->campaigns->resendToNonOpeners(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ResendToNonOpenersCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function resendToNonOpeners(string $campaignId, ?array $options = null): ?ResendToNonOpenersCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/resend-to-non-openers",
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
                return ResendToNonOpenersCampaignsResponse::fromJson($json);
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
     * Resumes a paused campaign. Sending continues with remaining recipients, including A/B test phases when the campaign has a linked test.
     *
     * Example:
     * ```php
     * $client->campaigns->resume(
     *     'campaignId',
     *     new ResumeCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ResumeCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ResumeCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function resume(string $campaignId, ResumeCampaignsRequest $request = new ResumeCampaignsRequest(), ?array $options = null): ?ResumeCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/resume",
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
                return ResumeCampaignsResponse::fromJson($json);
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
     * Revokes the campaign's public view-in-browser link. The shared URL returns 404 immediately; sharing again later mints a different URL. Returns revoked=false when no link was active.
     *
     * Example:
     * ```php
     * $client->campaigns->revokeShareLink(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RevokeShareLinkCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function revokeShareLink(string $campaignId, ?array $options = null): ?RevokeShareLinkCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/share-link",
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
                return RevokeShareLinkCampaignsResponse::fromJson($json);
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
     * Schedules a draft or already scheduled campaign for a future send time. Requires a verified sending domain. Campaigns that require safety review are held in waiting_approval and scheduled after a reviewer approves them. A waiting_approval result is a normal 200 outcome and is most common on new accounts and recently registered sending domains; retrying the schedule call does not clear the hold, so branch on campaign.status and poll GET /campaigns/{campaignId} instead. See https://docs.sequenzy.com/concepts/campaigns#safety-review
     *
     * Example:
     * ```php
     * $client->campaigns->schedule(
     *     'campaignId',
     *     new ScheduleCampaignsRequest([
     *         'scheduledAt' => new DateTime('2024-01-15T09:30:00Z'),
     *         'targetLists' => [
     *             'type' => "all",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ScheduleCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ScheduleCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function schedule(string $campaignId, ScheduleCampaignsRequest $request, ?array $options = null): ?ScheduleCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/schedule",
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
                return ScheduleCampaignsResponse::fromJson($json);
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
     * Queues a test send for a campaign and returns a durable email send ID for delivery-status inspection.
     *
     * Example:
     * ```php
     * $client->campaigns->sendTest(
     *     'campaignId',
     *     new SendTestCampaignsRequest([
     *         'to' => 'to',
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param SendTestCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SendTestCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function sendTest(string $campaignId, SendTestCampaignsRequest $request, ?array $options = null): ?SendTestCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/test",
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
                return SendTestCampaignsResponse::fromJson($json);
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
     * Removes the pending send for a scheduled campaign and returns it to an editable draft. Recurrence is stopped, and the campaign can be edited and scheduled again.
     *
     * Example:
     * ```php
     * $client->campaigns->unschedule(
     *     'campaignId',
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UnscheduleCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function unschedule(string $campaignId, ?array $options = null): ?UnscheduleCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/unschedule",
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
                return UnscheduleCampaignsResponse::fromJson($json);
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
     * Update a draft campaign's name, labels, content, audience, From/Reply-To settings, campaign personalization data, or delivery pacing (sendTimeOptimization and sendTimeWindowHours). Direct addresses create profiles when needed. Send Time Optimization is campaign-only; sequences use sendingWindow. Marketer account keys must choose existing sender and Reply-To profiles; requests requiring new profiles return 400 before creating profiles, labels, or campaign/sequence changes, including nested steps and branches.
     *
     * Example:
     * ```php
     * $client->campaigns->update(
     *     'campaignId',
     *     new UpdateCampaignsRequest([
     *         'subject' => 'A quick update',
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param UpdateCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $campaignId, UpdateCampaignsRequest $request = new UpdateCampaignsRequest(), ?array $options = null): ?UpdateCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}",
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
                return UpdateCampaignsResponse::fromJson($json);
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
     * Replaces the editable configuration for an existing email-campaign goal. SMS campaigns are not supported.
     *
     * Example:
     * ```php
     * $client->campaigns->updateGoal(
     *     'campaignId',
     *     'goalId',
     *     new UpdateGoalCampaignsRequest([
     *         'body' => new CampaignGoalInput([]),
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId
     * @param string $goalId
     * @param UpdateGoalCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateGoalCampaignsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateGoal(string $campaignId, string $goalId, UpdateGoalCampaignsRequest $request, ?array $options = null): ?UpdateGoalCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/goals/{$goalId}",
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
                return UpdateGoalCampaignsResponse::fromJson($json);
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
