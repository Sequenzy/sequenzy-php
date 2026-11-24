<?php

namespace Sequenzy\Analytics;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Analytics\Requests\GetCampaignConditionalBlockStatsRequest;
use Sequenzy\Analytics\Types\GetCampaignConditionalBlockStatsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonSerializer;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Analytics\Requests\GetCampaignEmailClientMetricsRequest;
use Sequenzy\Analytics\Types\GetCampaignEmailClientMetricsResponse;
use Sequenzy\Analytics\Requests\GetCampaignMetricsRequest;
use Sequenzy\Analytics\Types\GetCampaignMetricsResponse;
use Sequenzy\Analytics\Requests\GetCampaignStatsLegacyRequest;
use Sequenzy\Analytics\Types\GetCampaignStatsLegacyResponse;
use Sequenzy\Analytics\Requests\GetEmailClientMetricsRequest;
use Sequenzy\Analytics\Types\GetEmailClientMetricsResponse;
use Sequenzy\Analytics\Requests\GetLinkClickMetricsRequest;
use Sequenzy\Analytics\Types\GetLinkClickMetricsResponse;
use Sequenzy\Analytics\Requests\GetMetricsRequest;
use Sequenzy\Analytics\Types\GetMetricsResponse;
use Sequenzy\Analytics\Requests\GetMetricsBreakdownRequest;
use Sequenzy\Analytics\Types\GetMetricsBreakdownResponse;
use Sequenzy\Analytics\Requests\GetRecipientsRequest;
use Sequenzy\Analytics\Types\GetRecipientsResponse;
use Sequenzy\Analytics\Requests\GetSequenceConditionalBlockOverviewRequest;
use Sequenzy\Analytics\Types\GetSequenceConditionalBlockOverviewResponse;
use Sequenzy\Analytics\Requests\GetSequenceMetricsRequest;
use Sequenzy\Analytics\Types\GetSequenceMetricsResponse;
use Sequenzy\Analytics\Requests\GetSequenceOutcomesRequest;
use Sequenzy\Analytics\Types\GetSequenceOutcomesResponse;
use Sequenzy\Analytics\Requests\GetSequenceStepConditionalBlockStatsRequest;
use Sequenzy\Analytics\Types\GetSequenceStepConditionalBlockStatsResponse;
use Sequenzy\Analytics\Requests\GetStatsLegacyRequest;
use Sequenzy\Analytics\Types\GetStatsLegacyResponse;
use Sequenzy\Analytics\Requests\GetTransactionalConditionalBlockStatsRequest;
use Sequenzy\Analytics\Types\GetTransactionalConditionalBlockStatsResponse;
use Sequenzy\Analytics\Requests\GetTransactionalMetricsRequest;
use Sequenzy\Types\TransactionalMetricsResponse;
use Sequenzy\Analytics\Requests\GetTransactionalMetricsLegacyRequest;
use Sequenzy\Analytics\Requests\ListCampaignConditionalBlockSubscribersRequest;
use Sequenzy\Analytics\Types\ListCampaignConditionalBlockSubscribersResponse;
use Sequenzy\Analytics\Requests\ListCampaignEventsRequest;
use Sequenzy\Analytics\Types\ListCampaignEventsResponse;
use Sequenzy\Analytics\Requests\ListCampaignPollResponsesRequest;
use Sequenzy\Analytics\Types\ListCampaignPollResponsesResponse;
use Sequenzy\Analytics\Requests\ListCampaignPollResponsesLegacyRequest;
use Sequenzy\Analytics\Types\ListCampaignPollResponsesLegacyResponse;
use Sequenzy\Analytics\Requests\ListCampaignRepliesRequest;
use Sequenzy\Analytics\Types\ListCampaignRepliesResponse;
use Sequenzy\Analytics\Requests\ListCampaignRepliesLegacyRequest;
use Sequenzy\Analytics\Types\ListCampaignRepliesLegacyResponse;
use Sequenzy\Analytics\Requests\ListEmailMetricsRequest;
use Sequenzy\Analytics\Types\ListEmailMetricsResponse;
use Sequenzy\Analytics\Requests\ListSequenceEventsRequest;
use Sequenzy\Analytics\Types\ListSequenceEventsResponse;
use Sequenzy\Analytics\Requests\ListSequencePathSubscribersRequest;
use Sequenzy\Analytics\Types\ListSequencePathSubscribersResponse;
use Sequenzy\Analytics\Requests\ListSequenceStepConditionalBlockSubscribersRequest;
use Sequenzy\Analytics\Types\ListSequenceStepConditionalBlockSubscribersResponse;
use Sequenzy\Analytics\Requests\ListTransactionalConditionalBlockSubscribersRequest;
use Sequenzy\Analytics\Types\ListTransactionalConditionalBlockSubscribersResponse;

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
     * Returns per-block if/else and show/hide branch splits, engagement rates, and goal conversions for conditional blocks inside a campaign email.
     *
     * Example:
     * ```php
     * $client->analytics->getCampaignConditionalBlockStats(
     *     'campaignId',
     *     new GetCampaignConditionalBlockStatsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param GetCampaignConditionalBlockStatsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetCampaignConditionalBlockStatsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getCampaignConditionalBlockStats(string $campaignId, GetCampaignConditionalBlockStatsRequest $request = new GetCampaignConditionalBlockStatsRequest(), ?array $options = null): ?GetCampaignConditionalBlockStatsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->abTestVariantId != null) {
            $query['abTestVariantId'] = $request->abTestVariantId;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
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
                    path: "metrics/campaigns/{$campaignId}/conditional-blocks",
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
                return GetCampaignConditionalBlockStatsResponse::fromJson($json);
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
     * Returns the mail clients and device types that opened a campaign, as shares of its unique opens. Each email send counts once, attributed to the client of its first open. Covers the whole campaign.
     *
     * Example:
     * ```php
     * $client->analytics->getCampaignEmailClientMetrics(
     *     'campaignId',
     *     new GetCampaignEmailClientMetricsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Email campaign ID.
     * @param GetCampaignEmailClientMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetCampaignEmailClientMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getCampaignEmailClientMetrics(string $campaignId, GetCampaignEmailClientMetricsRequest $request = new GetCampaignEmailClientMetricsRequest(), ?array $options = null): ?GetCampaignEmailClientMetricsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->mailboxProvider != null) {
            $query['mailboxProvider'] = $request->mailboxProvider;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/campaigns/{$campaignId}/clients",
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
                return GetCampaignEmailClientMetricsResponse::fromJson($json);
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
     * Returns the mail clients and device types that opened your emails, as shares of unique opens. Each email send counts once, attributed to the client of its first open. Defaults to the last 90 days.
     *
     * Example:
     * ```php
     * $client->analytics->getEmailClientMetrics(
     *     new GetEmailClientMetricsRequest([]),
     * );
     * ```
     *
     * @param GetEmailClientMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetEmailClientMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getEmailClientMetrics(GetEmailClientMetricsRequest $request = new GetEmailClientMetricsRequest(), ?array $options = null): ?GetEmailClientMetricsResponse
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
                    path: "metrics/clients",
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
                return GetEmailClientMetricsResponse::fromJson($json);
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
     * Returns clicks per link destination across every email in the time range, ranked by unique clicks, which count each subscriber once per link however often they clicked. Destinations ignore query strings, fragments and trailing slashes, so the same page linked with different UTM tags counts as one link, and links that differ only by query parameters, such as video or product IDs, are combined. Test sends are excluded. Defaults to the last 90 days. For one campaign's links with exact URLs, read `clickedLinks` from the campaign metrics endpoint.
     *
     * Example:
     * ```php
     * $client->analytics->getLinkClickMetrics(
     *     new GetLinkClickMetricsRequest([]),
     * );
     * ```
     *
     * @param GetLinkClickMetricsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetLinkClickMetricsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getLinkClickMetrics(GetLinkClickMetricsRequest $request = new GetLinkClickMetricsRequest(), ?array $options = null): ?GetLinkClickMetricsResponse
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
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
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
                    path: "metrics/links",
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
                return GetLinkClickMetricsResponse::fromJson($json);
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
        if ($request->outcome != null) {
            $query['outcome'] = $request->outcome;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->recipientDomain != null) {
            $query['recipientDomain'] = $request->recipientDomain;
        }
        if ($request->source != null) {
            $query['source'] = $request->source;
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
     * Returns the delivery funnel for each value of one dimension, most sends first, so you can find the email, sequence, provider or domain behind a number and drill into it. Rows count the sends made in the window and the engagement they earned. Defaults to the last 30 days and 25 rows.
     *
     * Example:
     * ```php
     * $client->analytics->getMetricsBreakdown(
     *     new GetMetricsBreakdownRequest([]),
     * );
     * ```
     *
     * @param GetMetricsBreakdownRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetMetricsBreakdownResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getMetricsBreakdown(GetMetricsBreakdownRequest $request = new GetMetricsBreakdownRequest(), ?array $options = null): ?GetMetricsBreakdownResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->by != null) {
            $query['by'] = $request->by;
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
        if ($request->mailboxProvider != null) {
            $query['mailboxProvider'] = $request->mailboxProvider;
        }
        if ($request->outcome != null) {
            $query['outcome'] = $request->outcome;
        }
        if ($request->period != null) {
            $query['period'] = $request->period;
        }
        if ($request->recipientDomain != null) {
            $query['recipientDomain'] = $request->recipientDomain;
        }
        if ($request->source != null) {
            $query['source'] = $request->source;
        }
        if ($request->start != null) {
            $query['start'] = JsonSerializer::serializeDateTime($request->start);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "metrics/breakdown",
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
                return GetMetricsBreakdownResponse::fromJson($json);
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
     * Returns a sequence-wide summary of all email steps that use conditional blocks, including collapsed rule group counts and automatic dead-rule or fallback-spike alerts.
     *
     * Example:
     * ```php
     * $client->analytics->getSequenceConditionalBlockOverview(
     *     'sequenceId',
     *     new GetSequenceConditionalBlockOverviewRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param GetSequenceConditionalBlockOverviewRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSequenceConditionalBlockOverviewResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSequenceConditionalBlockOverview(string $sequenceId, GetSequenceConditionalBlockOverviewRequest $request = new GetSequenceConditionalBlockOverviewRequest(), ?array $options = null): ?GetSequenceConditionalBlockOverviewResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
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
                    path: "metrics/sequences/{$sequenceId}/conditional-blocks",
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
                return GetSequenceConditionalBlockOverviewResponse::fromJson($json);
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
     * Returns per-path split counts and post-step cohort conversion rates for branch, condition, and action steps in a sequence, plus a baseline across all enrollments and optional per-goal email attribution. Rule-based branches are observational (causal false); random splits report mature-cohort significance (causal true). For goal outcomes, attributed conversions are scoped to the selected goalId and can differ from all-goals canvas email badges.
     *
     * Example:
     * ```php
     * $client->analytics->getSequenceOutcomes(
     *     'sequenceId',
     *     new GetSequenceOutcomesRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param GetSequenceOutcomesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSequenceOutcomesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSequenceOutcomes(string $sequenceId, GetSequenceOutcomesRequest $request = new GetSequenceOutcomesRequest(), ?array $options = null): ?GetSequenceOutcomesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->conversionWindowDays != null) {
            $query['conversionWindowDays'] = $request->conversionWindowDays;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->eventName != null) {
            $query['eventName'] = $request->eventName;
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
        }
        if ($request->nodeId != null) {
            $query['nodeId'] = $request->nodeId;
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
                    path: "metrics/sequences/{$sequenceId}/outcomes",
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
                return GetSequenceOutcomesResponse::fromJson($json);
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
     * Returns per-block if/else and show/hide performance for conditional blocks inside a sequence email or A/B test step.
     *
     * Example:
     * ```php
     * $client->analytics->getSequenceStepConditionalBlockStats(
     *     'sequenceId',
     *     'nodeId',
     *     new GetSequenceStepConditionalBlockStatsRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId
     * @param string $nodeId
     * @param GetSequenceStepConditionalBlockStatsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSequenceStepConditionalBlockStatsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSequenceStepConditionalBlockStats(string $sequenceId, string $nodeId, GetSequenceStepConditionalBlockStatsRequest $request = new GetSequenceStepConditionalBlockStatsRequest(), ?array $options = null): ?GetSequenceStepConditionalBlockStatsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->abTestVariantId != null) {
            $query['abTestVariantId'] = $request->abTestVariantId;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
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
                    path: "metrics/sequences/{$sequenceId}/steps/{$nodeId}/conditional-blocks",
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
                return GetSequenceStepConditionalBlockStatsResponse::fromJson($json);
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
     * Returns per-block if/else and show/hide performance for conditional blocks inside a transactional email.
     *
     * Example:
     * ```php
     * $client->analytics->getTransactionalConditionalBlockStats(
     *     'idOrSlug',
     *     new GetTransactionalConditionalBlockStatsRequest([]),
     * );
     * ```
     *
     * @param string $idOrSlug
     * @param GetTransactionalConditionalBlockStatsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetTransactionalConditionalBlockStatsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getTransactionalConditionalBlockStats(string $idOrSlug, GetTransactionalConditionalBlockStatsRequest $request = new GetTransactionalConditionalBlockStatsRequest(), ?array $options = null): ?GetTransactionalConditionalBlockStatsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
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
                    path: "metrics/transactional/{$idOrSlug}/conditional-blocks",
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
                return GetTransactionalConditionalBlockStatsResponse::fromJson($json);
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
     * Returns paginated recipients who received a specific branch of a conditional block inside a campaign email.
     *
     * Example:
     * ```php
     * $client->analytics->listCampaignConditionalBlockSubscribers(
     *     'campaignId',
     *     'blockId',
     *     new ListCampaignConditionalBlockSubscribersRequest([
     *         'branch' => ListCampaignConditionalBlockSubscribersRequestBranch::If_->value,
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param string $blockId Conditional block ID
     * @param ListCampaignConditionalBlockSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignConditionalBlockSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listCampaignConditionalBlockSubscribers(string $campaignId, string $blockId, ListCampaignConditionalBlockSubscribersRequest $request, ?array $options = null): ?ListCampaignConditionalBlockSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['branch'] = $request->branch;
        if ($request->abTestVariantId != null) {
            $query['abTestVariantId'] = $request->abTestVariantId;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
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
                    path: "metrics/campaigns/{$campaignId}/conditional-blocks/{$blockId}/subscribers",
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
                return ListCampaignConditionalBlockSubscribersResponse::fromJson($json);
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
     * Returns one row per respondent per Poll or NPS block in a campaign, newest answer first, with the answer, its stored value, the subscriber attribute the answer was saved to, and the response time. Only each subscriber's latest answer per block is returned, so counts match the `polls` summaries from the campaign metrics endpoint. Multi-select answers list every selected option in `answers` and `values`. Each row also carries the respondent's latest comment from the poll's confirmation page; pass `hasComment=true` to list only respondents who commented, newest comment first. For a sequence email step, pass the step's automation node ID as `campaignId`. Also available at `GET /campaigns/{campaignId}/poll-responses`.
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
        if ($request->hasComment != null) {
            $query['hasComment'] = $request->hasComment;
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
        if ($request->hasComment != null) {
            $query['hasComment'] = $request->hasComment;
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
     * Returns one row per reply to a campaign, newest first, with the subscriber who replied, the send they replied to, attachment counts, the reply time and the inbox conversation holding the reply. `pagination.total` matches `stats.replies` from the campaign metrics endpoint called without `period`, `start` or `end`, which narrow that count, or `mailboxProvider`, which reports 0 replies. Reply text is not returned: read it with `GET /conversations/{conversationId}`. `conversationId` is null when the reply has no inbox conversation. Requires the `analytics:read` scope. Also available at `GET /campaigns/{campaignId}/replies`.
     *
     * Example:
     * ```php
     * $client->analytics->listCampaignReplies(
     *     'campaignId',
     *     new ListCampaignRepliesRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ListCampaignRepliesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignRepliesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listCampaignReplies(string $campaignId, ListCampaignRepliesRequest $request = new ListCampaignRepliesRequest(), ?array $options = null): ?ListCampaignRepliesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
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
                    path: "metrics/campaigns/{$campaignId}/replies",
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
                return ListCampaignRepliesResponse::fromJson($json);
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
     * Alias for `GET /metrics/campaigns/{campaignId}/replies`.
     *
     * Example:
     * ```php
     * $client->analytics->listCampaignRepliesLegacy(
     *     'campaignId',
     *     new ListCampaignRepliesLegacyRequest([]),
     * );
     * ```
     *
     * @param string $campaignId Campaign ID
     * @param ListCampaignRepliesLegacyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignRepliesLegacyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listCampaignRepliesLegacy(string $campaignId, ListCampaignRepliesLegacyRequest $request = new ListCampaignRepliesLegacyRequest(), ?array $options = null): ?ListCampaignRepliesLegacyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
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
                    path: "campaigns/{$campaignId}/replies",
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
                return ListCampaignRepliesLegacyResponse::fromJson($json);
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

    /**
     * Returns paginated enrollments that took a specific branch path (or reached a step), including redacted evaluation reasons and optional cohort conversion status within the conversion window.
     *
     * Example:
     * ```php
     * $client->analytics->listSequencePathSubscribers(
     *     'sequenceId',
     *     'nodeId',
     *     new ListSequencePathSubscribersRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param string $nodeId Branch, condition, or step node ID
     * @param ListSequencePathSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSequencePathSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listSequencePathSubscribers(string $sequenceId, string $nodeId, ListSequencePathSubscribersRequest $request = new ListSequencePathSubscribersRequest(), ?array $options = null): ?ListSequencePathSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->bucket != null) {
            $query['bucket'] = $request->bucket;
        }
        if ($request->conversionWindowDays != null) {
            $query['conversionWindowDays'] = $request->conversionWindowDays;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->eventName != null) {
            $query['eventName'] = $request->eventName;
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pathId != null) {
            $query['pathId'] = $request->pathId;
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
                    path: "metrics/sequences/{$sequenceId}/paths/{$nodeId}/subscribers",
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
                return ListSequencePathSubscribersResponse::fromJson($json);
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
     * Returns paginated recipients who received a specific branch of a conditional block inside a sequence email step.
     *
     * Example:
     * ```php
     * $client->analytics->listSequenceStepConditionalBlockSubscribers(
     *     'sequenceId',
     *     'nodeId',
     *     'blockId',
     *     new ListSequenceStepConditionalBlockSubscribersRequest([
     *         'branch' => ListSequenceStepConditionalBlockSubscribersRequestBranch::If_->value,
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId
     * @param string $nodeId
     * @param string $blockId
     * @param ListSequenceStepConditionalBlockSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSequenceStepConditionalBlockSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listSequenceStepConditionalBlockSubscribers(string $sequenceId, string $nodeId, string $blockId, ListSequenceStepConditionalBlockSubscribersRequest $request, ?array $options = null): ?ListSequenceStepConditionalBlockSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['branch'] = $request->branch;
        if ($request->abTestVariantId != null) {
            $query['abTestVariantId'] = $request->abTestVariantId;
        }
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
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
                    path: "metrics/sequences/{$sequenceId}/steps/{$nodeId}/conditional-blocks/{$blockId}/subscribers",
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
                return ListSequenceStepConditionalBlockSubscribersResponse::fromJson($json);
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
     * Returns paginated recipients who received a specific branch of a conditional block inside a transactional email.
     *
     * Example:
     * ```php
     * $client->analytics->listTransactionalConditionalBlockSubscribers(
     *     'idOrSlug',
     *     'blockId',
     *     new ListTransactionalConditionalBlockSubscribersRequest([
     *         'branch' => ListTransactionalConditionalBlockSubscribersRequestBranch::If_->value,
     *     ]),
     * );
     * ```
     *
     * @param string $idOrSlug
     * @param string $blockId
     * @param ListTransactionalConditionalBlockSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListTransactionalConditionalBlockSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listTransactionalConditionalBlockSubscribers(string $idOrSlug, string $blockId, ListTransactionalConditionalBlockSubscribersRequest $request, ?array $options = null): ?ListTransactionalConditionalBlockSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['branch'] = $request->branch;
        if ($request->end != null) {
            $query['end'] = JsonSerializer::serializeDateTime($request->end);
        }
        if ($request->goalId != null) {
            $query['goalId'] = $request->goalId;
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
                    path: "metrics/transactional/{$idOrSlug}/conditional-blocks/{$blockId}/subscribers",
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
                return ListTransactionalConditionalBlockSubscribersResponse::fromJson($json);
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
