<?php

namespace Sequenzy\Analytics;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Analytics\Requests\GetCampaignMetricsRequest;
use Sequenzy\Analytics\Types\GetCampaignMetricsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonSerializer;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Analytics\Requests\GetCampaignStatsLegacyRequest;
use Sequenzy\Analytics\Types\GetCampaignStatsLegacyResponse;
use Sequenzy\Analytics\Requests\GetMetricsRequest;
use Sequenzy\Analytics\Types\GetMetricsResponse;
use Sequenzy\Analytics\Requests\GetRecipientsRequest;
use Sequenzy\Analytics\Types\GetRecipientsResponse;
use Sequenzy\Analytics\Requests\GetSequenceMetricsRequest;
use Sequenzy\Analytics\Types\GetSequenceMetricsResponse;
use Sequenzy\Analytics\Requests\GetStatsLegacyRequest;
use Sequenzy\Analytics\Types\GetStatsLegacyResponse;
use Sequenzy\Analytics\Requests\GetTransactionalMetricsRequest;
use Sequenzy\Types\TransactionalMetricsResponse;
use Sequenzy\Analytics\Requests\GetTransactionalMetricsLegacyRequest;
use Sequenzy\Analytics\Requests\ListCampaignEventsRequest;
use Sequenzy\Analytics\Types\ListCampaignEventsResponse;
use Sequenzy\Analytics\Requests\ListCampaignPollResponsesRequest;
use Sequenzy\Analytics\Types\ListCampaignPollResponsesResponse;
use Sequenzy\Analytics\Requests\ListCampaignPollResponsesLegacyRequest;
use Sequenzy\Analytics\Types\ListCampaignPollResponsesLegacyResponse;
use Sequenzy\Analytics\Requests\ListEmailMetricsRequest;
use Sequenzy\Analytics\Types\ListEmailMetricsResponse;
use Sequenzy\Analytics\Requests\ListSequenceEventsRequest;
use Sequenzy\Analytics\Types\ListSequenceEventsResponse;

class AnalyticsClient
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
     * Returns aggregated engagement metrics, attached campaign-goal results, a lifetime per-link click breakdown, and lifetime Poll/NPS summaries for a specific campaign. Clicked links and poll summaries are not limited by period/start/end.
     *
     * Example:
     * ```php
     * $client->analytics->getCampaignMetrics(
     *     'campaignId',
     *     new GetCampaignMetricsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param GetCampaignMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetCampaignMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getCampaignMetrics(string $campaignId, GetCampaignMetricsRequest $request = new GetCampaignMetricsRequest(), ?array $options = null): ?GetCampaignMetricsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->mailboxProvider != null) {
            $query['mailboxProvider'] = $request->mailboxProvider;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/campaigns/{$campaignId}",
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
                return GetCampaignMetricsResponse::fromJson($json);
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
     * Backward-compatible alias for `GET /metrics/campaigns/{campaignId}`. Returns aggregated engagement metrics, attached campaign-goal results, a lifetime per-link click breakdown, and lifetime Poll/NPS summaries for a specific campaign.
     *
     * Example:
     * ```php
     * $client->analytics->getCampaignStatsLegacy(
     *     'campaignId',
     *     new GetCampaignStatsLegacyRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param GetCampaignStatsLegacyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetCampaignStatsLegacyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getCampaignStatsLegacy(string $campaignId, GetCampaignStatsLegacyRequest $request = new GetCampaignStatsLegacyRequest(), ?array $options = null): ?GetCampaignStatsLegacyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->mailboxProvider != null) {
            $query['mailboxProvider'] = $request->mailboxProvider;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/stats",
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
                return GetCampaignStatsLegacyResponse::fromJson($json);
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
     * Returns aggregated email engagement metrics for the specified time period, plus live subscriberCount (every stored contact) and activeSubscriberCount (status=active) as an audience snapshot independent of period. Set emailType=transactional for Send API and transactional SMTP traffic.
     *
     * Example:
     * ```php
     * $client->analytics->getMetrics(
     *     new GetMetricsRequest([]),
     * );
     * ```
     *
     * @param GetMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getMetrics(GetMetricsRequest $request = new GetMetricsRequest(), ?array $options = null): ?GetMetricsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->emailType != null) {
            $query['emailType'] = $request->emailType;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->mailboxProvider != null) {
            $query['mailboxProvider'] = $request->mailboxProvider;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics",
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
                return GetMetricsResponse::fromJson($json);
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
     * Returns a paginated list of recipients with their open, click, and unsubscribe events. Use this to sync engagement data to your own database.
     *
     * Example:
     * ```php
     * $client->analytics->getRecipients(
     *     new GetRecipientsRequest([]),
     * );
     * ```
     *
     * @param GetRecipientsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetRecipientsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getRecipients(GetRecipientsRequest $request = new GetRecipientsRequest(), ?array $options = null): ?GetRecipientsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->campaignId != null) {
            $query['campaignId'] = $request->campaignId;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->sequenceId != null) {
            $query['sequenceId'] = $request->sequenceId;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/recipients",
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
                return GetRecipientsResponse::fromJson($json);
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
     * Returns aggregated engagement metrics plus a live active/waiting enrollment breakdown by current node for a specific sequence (automation).
     *
     * Example:
     * ```php
     * $client->analytics->getSequenceMetrics(
     *     'sequenceId',
     *     new GetSequenceMetricsRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence (automation) ID
     * @param GetSequenceMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSequenceMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSequenceMetrics(string $sequenceId, GetSequenceMetricsRequest $request = new GetSequenceMetricsRequest(), ?array $options = null): ?GetSequenceMetricsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/sequences/{$sequenceId}",
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
                return GetSequenceMetricsResponse::fromJson($json);
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
     * Backward-compatible alias for `GET /metrics`. Returns aggregated email engagement metrics for the specified time period and supports the same emailType filter.
     *
     * Example:
     * ```php
     * $client->analytics->getStatsLegacy(
     *     new GetStatsLegacyRequest([]),
     * );
     * ```
     *
     * @param GetStatsLegacyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetStatsLegacyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getStatsLegacy(GetStatsLegacyRequest $request = new GetStatsLegacyRequest(), ?array $options = null): ?GetStatsLegacyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->emailType != null) {
            $query['emailType'] = $request->emailType;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->mailboxProvider != null) {
            $query['mailboxProvider'] = $request->mailboxProvider;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "stats",
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
                return GetStatsLegacyResponse::fromJson($json);
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
     * Returns aggregate engagement metrics for one saved transactional email selected by ID or slug. Results are all-time unless a period or custom range is supplied.
     *
     * Example:
     * ```php
     * $client->analytics->getTransactionalMetrics(
     *     'idOrSlug',
     *     new GetTransactionalMetricsRequest([]),
     * );
     * ```
     *
     * @param string $idOrSlug Saved transactional email ID or API slug.
     * @param GetTransactionalMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TransactionalMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getTransactionalMetrics(string $idOrSlug, GetTransactionalMetricsRequest $request = new GetTransactionalMetricsRequest(), ?array $options = null): ?TransactionalMetricsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/transactional/{$idOrSlug}",
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
                return TransactionalMetricsResponse::fromJson($json);
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
     * Backward-compatible alias for `GET /metrics/transactional/{idOrSlug}`.
     *
     * Example:
     * ```php
     * $client->analytics->getTransactionalMetricsLegacy(
     *     'idOrSlug',
     *     new GetTransactionalMetricsLegacyRequest([]),
     * );
     * ```
     *
     * @param string $idOrSlug
     * @param GetTransactionalMetricsLegacyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TransactionalMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getTransactionalMetricsLegacy(string $idOrSlug, GetTransactionalMetricsLegacyRequest $request = new GetTransactionalMetricsLegacyRequest(), ?array $options = null): ?TransactionalMetricsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "transactional/{$idOrSlug}/stats",
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
                return TransactionalMetricsResponse::fromJson($json);
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
     * Returns paginated raw email events for a specific campaign. Defaults to delivery events.
     *
     * Example:
     * ```php
     * $client->analytics->listCampaignEvents(
     *     'campaignId',
     *     new ListCampaignEventsRequest([
     *         'eventTypes' => 'delivery,click',
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ListCampaignEventsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignEventsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listCampaignEvents(string $campaignId, ListCampaignEventsRequest $request = new ListCampaignEventsRequest(), ?array $options = null): ?ListCampaignEventsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->eventType != null) {
            $query['eventType'] = $request->eventType;
        }
        if ($request->eventTypes != null) {
            $query['eventTypes'] = $request->eventTypes;
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/campaigns/{$campaignId}/events",
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
                return ListCampaignEventsResponse::fromJson($json);
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
     * Returns one row per respondent per Poll or NPS block in a campaign, newest answer first, with the answer, its stored value, the subscriber attribute the answer was saved to, and the response time. Only each subscriber's latest answer per block is returned, so counts match the `polls` summaries from the campaign metrics endpoint. Multi-select answers list every selected option in `answers` and `values`. For a sequence email step, pass the step's automation node ID as `campaignId`. Also available at `GET /campaigns/{campaignId}/poll-responses`.
     *
     * Example:
     * ```php
     * $client->analytics->listCampaignPollResponses(
     *     'campaignId',
     *     new ListCampaignPollResponsesRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID, or the automation node ID of a sequence email step
     * @param ListCampaignPollResponsesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignPollResponsesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listCampaignPollResponses(string $campaignId, ListCampaignPollResponsesRequest $request = new ListCampaignPollResponsesRequest(), ?array $options = null): ?ListCampaignPollResponsesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->blockId != null) {
            $query['blockId'] = $request->blockId;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/campaigns/{$campaignId}/poll-responses",
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
                return ListCampaignPollResponsesResponse::fromJson($json);
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
     * Alias for `GET /metrics/campaigns/{campaignId}/poll-responses`.
     *
     * Example:
     * ```php
     * $client->analytics->listCampaignPollResponsesLegacy(
     *     'campaignId',
     *     new ListCampaignPollResponsesLegacyRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID, or the automation node ID of a sequence email step
     * @param ListCampaignPollResponsesLegacyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignPollResponsesLegacyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listCampaignPollResponsesLegacy(string $campaignId, ListCampaignPollResponsesLegacyRequest $request = new ListCampaignPollResponsesLegacyRequest(), ?array $options = null): ?ListCampaignPollResponsesLegacyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->blockId != null) {
            $query['blockId'] = $request->blockId;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "campaigns/{$campaignId}/poll-responses",
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
                return ListCampaignPollResponsesLegacyResponse::fromJson($json);
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
     * Returns one row per email - each campaign and each sequence email step - with its own delivery funnel, attributed conversions, and revenue. Sequence rows carry sequenceId, automationNodeId, and the step number, so cross-sequence questions such as how many step-4 emails went out are one request instead of one per sequence. Counts come from retained event storage and match the steps array of the sequence metrics endpoint. The totals object covers every matching email rather than the current page.
     *
     * Example:
     * ```php
     * $client->analytics->listEmailMetrics(
     *     new ListEmailMetricsRequest([
     *         'campaignId' => 'camp_abc123,camp_def456',
     *         'sequenceId' => 'seq_abc123,seq_def456',
     *     ]),
     * );
     * ```
     *
     * @param ListEmailMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listEmailMetrics(ListEmailMetricsRequest $request = new ListEmailMetricsRequest(), ?array $options = null): ?ListEmailMetricsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->campaignId != null) {
            $query['campaignId'] = $request->campaignId;
        }
        if ($request->emailType != null) {
            $query['emailType'] = $request->emailType;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->order != null) {
            $query['order'] = $request->order;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->sequenceId != null) {
            $query['sequenceId'] = $request->sequenceId;
        }
        if ($request->sort != null) {
            $query['sort'] = $request->sort;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        if ($request->step != null) {
            $query['step'] = $request->step;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/emails",
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
                return ListEmailMetricsResponse::fromJson($json);
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
     * Returns paginated raw email events for every email step in a sequence, or for one step via automationNodeId. Defaults to delivery events. This is the per-recipient stream; for per-step totals read the steps array of the sequence metrics endpoint or GET /metrics/emails.
     *
     * Example:
     * ```php
     * $client->analytics->listSequenceEvents(
     *     'sequenceId',
     *     new ListSequenceEventsRequest([
     *         'eventTypes' => 'delivery,open,click',
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence (automation) ID
     * @param ListSequenceEventsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSequenceEventsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listSequenceEvents(string $sequenceId, ListSequenceEventsRequest $request = new ListSequenceEventsRequest(), ?array $options = null): ?ListSequenceEventsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->automationNodeId != null) {
            $query['automationNodeId'] = $request->automationNodeId;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->eventType != null) {
            $query['eventType'] = $request->eventType;
        }
        if ($request->eventTypes != null) {
            $query['eventTypes'] = $request->eventTypes;
        }
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/sequences/{$sequenceId}/events",
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
                return ListSequenceEventsResponse::fromJson($json);
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
