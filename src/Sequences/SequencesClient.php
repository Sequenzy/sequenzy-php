<?php

namespace Sequenzy\Sequences;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Sequences\Types\ArchiveSequencesResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Sequences\Requests\SequenceEnrollmentCancelRequest;
use Sequenzy\Types\SequenceEnrollmentCancelResponse;
use Sequenzy\Sequences\Requests\ConfigureInboundWebhookSequencesRequest;
use Sequenzy\Sequences\Types\ConfigureInboundWebhookSequencesResponse;
use Sequenzy\Sequences\Requests\SequenceCreateRequest;
use Sequenzy\Types\SequenceCreateResponse;
use Sequenzy\Sequences\Requests\CreateGoalSequencesRequest;
use Sequenzy\Sequences\Types\CreateGoalSequencesResponse;
use Sequenzy\Types\SequenceActionResponse;
use Sequenzy\Sequences\Types\DeleteGoalSequencesResponse;
use Sequenzy\Sequences\Requests\DuplicateSequencesRequest;
use Sequenzy\Sequences\Types\DuplicateSequencesResponse;
use Sequenzy\Sequences\Requests\EnrollSubscribersInSequencesRequest;
use Sequenzy\Sequences\Types\EnrollSubscribersInSequencesResponse;
use Sequenzy\Sequences\Requests\GenerateSequencesRequest;
use Sequenzy\Sequences\Types\GenerateSequencesResponse;
use Sequenzy\Sequences\Types\GetSequencesResponse;
use Sequenzy\Types\SequenceEnrollmentGetResponse;
use Sequenzy\Types\SequenceEnrollmentRealignJobResponse;
use Sequenzy\Sequences\Types\GetInboundWebhookSequencesResponse;
use Sequenzy\Sequences\Requests\GetStatsSequencesRequest;
use Sequenzy\Sequences\Types\GetStatsSequencesResponse;
use Sequenzy\Core\Json\JsonSerializer;
use Sequenzy\Sequences\Requests\ListSequencesRequest;
use Sequenzy\Sequences\Types\ListSequencesResponse;
use Sequenzy\Sequences\Requests\ListEnrollmentsSequencesRequest;
use Sequenzy\Types\SequenceEnrollmentListResponse;
use Sequenzy\Sequences\Types\ListGoalsSequencesResponse;
use Sequenzy\Sequences\Requests\SequenceEnrollmentMoveRequest;
use Sequenzy\Types\SequenceEnrollmentMoveResponse;
use Sequenzy\Sequences\Requests\SequenceEnrollmentRealignRequest;
use Sequenzy\Types\SequenceEnrollmentRealignResponse;
use Sequenzy\Sequences\Requests\RenderStepSequencesRequest;
use Sequenzy\Types\RenderEmailResponse;
use Sequenzy\Sequences\Types\RotateInboundWebhookSecretSequencesResponse;
use Sequenzy\Sequences\Requests\SendTestEmailSequencesRequest;
use Sequenzy\Sequences\Types\SendTestEmailSequencesResponse;
use Sequenzy\Sequences\Requests\SimulateSequencesRequest;
use Sequenzy\Sequences\Types\SimulateSequencesResponse;
use Sequenzy\Sequences\Types\UnarchiveSequencesResponse;
use Sequenzy\Sequences\Requests\SequenceUpdateRequest;
use Sequenzy\Sequences\Types\UpdateSequencesResponse;
use Sequenzy\Sequences\Requests\UpdateGoalSequencesRequest;
use Sequenzy\Sequences\Types\UpdateGoalSequencesResponse;

class SequencesClient
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
     * Archives a sequence and stops new enrollments.
     *
     * Example:
     * ```php
     * $client->sequences->archive(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ArchiveSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function archive(string $sequenceId, ?array $options = null): ?ArchiveSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/archive",
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
                return ArchiveSequencesResponse::fromJson($json);
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
     * Cancels active or waiting enrollments in one sequence. Target every enrollment with cancelAll, a batch with subscriberIds, one contact with subscriberId, or matching stored entry event property values with fieldValues. Bulk cancellation is capped at 1000 enrollments per request; repeat the request while remainingCount is above zero.
     *
     * Example:
     * ```php
     * $client->sequences->cancelEnrollments(
     *     'sequenceId',
     *     new SequenceEnrollmentCancelRequest([
     *         'cancelAll' => true,
     *         'dryRun' => false,
     *         'reason' => 'Lifecycle cutover',
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param SequenceEnrollmentCancelRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceEnrollmentCancelResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function cancelEnrollments(string $sequenceId, SequenceEnrollmentCancelRequest $request = new SequenceEnrollmentCancelRequest(), ?array $options = null): ?SequenceEnrollmentCancelResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enrollments/cancel",
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
                return SequenceEnrollmentCancelResponse::fromJson($json);
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
     * Creates or updates the endpoint attached to an inbound_webhook trigger. On first setup, omitted fields use catalog/custom integration defaults; on later calls, omitted fields keep their saved values. Use null to clear a saved mapping or sample.
     *
     * Example:
     * ```php
     * $client->sequences->configureInboundWebhook(
     *     'sequenceId',
     *     new ConfigureInboundWebhookSequencesRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId
     * @param ConfigureInboundWebhookSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ConfigureInboundWebhookSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function configureInboundWebhook(string $sequenceId, ConfigureInboundWebhookSequencesRequest $request = new ConfigureInboundWebhookSequencesRequest(), ?array $options = null): ?ConfigureInboundWebhookSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/inbound-webhook",
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
                return ConfigureInboundWebhookSequencesResponse::fromJson($json);
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
     * Creates a draft automation sequence using AI-generated content, explicit email/action steps, or a blank trigger-to-completion graph when both are omitted. Discount action steps dynamically generate Stripe or Shopify codes that later emails can reference with discount merge tags.
     *
     * Example:
     * ```php
     * $client->sequences->create(
     *     new SequenceCreateRequest([
     *         'name' => 'Cancellation feedback',
     *     ]),
     * );
     * ```
     *
     * @param SequenceCreateRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceCreateResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(SequenceCreateRequest $request, ?array $options = null): ?SequenceCreateResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences",
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
                return SequenceCreateResponse::fromJson($json);
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
     * Creates a conversion goal for an event, subscriber attribute change, or applied tag.
     *
     * Example:
     * ```php
     * $client->sequences->createGoal(
     *     'sequenceId',
     *     new CreateGoalSequencesRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId
     * @param CreateGoalSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateGoalSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createGoal(string $sequenceId, CreateGoalSequencesRequest $request = new CreateGoalSequencesRequest(), ?array $options = null): ?CreateGoalSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/goals",
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
                return CreateGoalSequencesResponse::fromJson($json);
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
     * Deletes a sequence and its automation nodes.
     *
     * Example:
     * ```php
     * $client->sequences->delete(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceActionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $sequenceId, ?array $options = null): ?SequenceActionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}",
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
                return SequenceActionResponse::fromJson($json);
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
     * Permanently removes a conversion goal from the sequence.
     *
     * Example:
     * ```php
     * $client->sequences->deleteGoal(
     *     'sequenceId',
     *     'goalId',
     * );
     * ```
     *
     * @param string $sequenceId
     * @param string $goalId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteGoalSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteGoal(string $sequenceId, string $goalId, ?array $options = null): ?DeleteGoalSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/goals/{$goalId}",
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
                return DeleteGoalSequencesResponse::fromJson($json);
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
     * Pauses a sequence, blocks new enrollments, and holds workflow execution until the sequence is enabled again.
     *
     * Example:
     * ```php
     * $client->sequences->disable(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceActionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function disable(string $sequenceId, ?array $options = null): ?SequenceActionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/disable",
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
                return SequenceActionResponse::fromJson($json);
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
     * Creates an independent draft copy of the sequence graph, email templates, and sequence A/B tests.
     *
     * Example:
     * ```php
     * $client->sequences->duplicate(
     *     'sequenceId',
     *     new DuplicateSequencesRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId
     * @param DuplicateSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DuplicateSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function duplicate(string $sequenceId, DuplicateSequencesRequest $request = new DuplicateSequencesRequest(), ?array $options = null): ?DuplicateSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/duplicate",
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
                return DuplicateSequencesResponse::fromJson($json);
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
     * Activates a sequence and opens it for new enrollments. Activation enforces the same readiness checks returned by simulateSequence; invalid triggers, incomplete steps, disconnected graphs, and archived sequences are rejected without changing status. If it was paused, held subscribers continue from their current step and due waits are queued gradually.
     *
     * Example:
     * ```php
     * $client->sequences->enable(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceActionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function enable(string $sequenceId, ?array $options = null): ?SequenceActionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enable",
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
                return SequenceActionResponse::fromJson($json);
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
     * Manually enrolls active subscribers into a sequence by email or subscriber ID, starting at the first step or a specific node.
     *
     * Example:
     * ```php
     * $client->sequences->enrollSubscribersIn(
     *     'sequenceId',
     *     new EnrollSubscribersInSequencesRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID.
     * @param EnrollSubscribersInSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?EnrollSubscribersInSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function enrollSubscribersIn(string $sequenceId, EnrollSubscribersInSequencesRequest $request = new EnrollSubscribersInSequencesRequest(), ?array $options = null): ?EnrollSubscribersInSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enroll",
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
                return EnrollSubscribersInSequencesResponse::fromJson($json);
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
     * Deprecated compatibility alias that creates and persists a disabled contact_added sequence draft from a goal. Use POST /sequences for new integrations.
     *
     * Example:
     * ```php
     * $client->sequences->generate(
     *     new GenerateSequencesRequest([
     *         'goal' => 'Onboard a new workspace admin',
     *     ]),
     * );
     * ```
     *
     * @param GenerateSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GenerateSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function generate(GenerateSequencesRequest $request, ?array $options = null): ?GenerateSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "generate/sequence",
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
                return GenerateSequencesResponse::fromJson($json);
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
     * Returns sequence metadata, nodes, and editable email steps.
     *
     * Example:
     * ```php
     * $client->sequences->get(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $sequenceId, ?array $options = null): ?GetSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}",
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
                return GetSequencesResponse::fromJson($json);
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
     * Reads one enrollment token, including how it entered, which branches it already took, and the bounded recorded graph walk from ClickHouse. Use this when list enrollments shows a completed token with enteredVia unknown or sitting on the completion node and you need to know why the first branch took its else path. Compared values are summaries (missing, empty, nonempty, equals_expected), never the raw field or event-property value. Legacy node-completion metadata that stored an unredacted evaluation reason is redacted on read. Check nodeHistoryTruncated and branchDecisionsTruncated before treating either history as complete.
     *
     * Example:
     * ```php
     * $client->sequences->getEnrollment(
     *     'sequenceId',
     *     'enrollmentId',
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param string $enrollmentId Enrollment token ID from list sequence enrollments (enrollmentId).
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceEnrollmentGetResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getEnrollment(string $sequenceId, string $enrollmentId, ?array $options = null): ?SequenceEnrollmentGetResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enrollments/{$enrollmentId}",
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
                return SequenceEnrollmentGetResponse::fromJson($json);
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
     * Returns the state of an applied realignment job. When status is completed, result contains the bounded realignment result and any continuation cursor.
     *
     * Example:
     * ```php
     * $client->sequences->getEnrollmentRealignment(
     *     'sequenceId',
     *     'jobId',
     * );
     * ```
     *
     * @param string $sequenceId
     * @param string $jobId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceEnrollmentRealignJobResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getEnrollmentRealignment(string $sequenceId, string $jobId, ?array $options = null): ?SequenceEnrollmentRealignJobResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enrollments/realign-sending-window/jobs/{$jobId}",
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
                return SequenceEnrollmentRealignJobResponse::fromJson($json);
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
     * Returns the endpoint configuration attached to an inbound_webhook trigger.
     *
     * Example:
     * ```php
     * $client->sequences->getInboundWebhook(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetInboundWebhookSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInboundWebhook(string $sequenceId, ?array $options = null): ?GetInboundWebhookSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/inbound-webhook",
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
                return GetInboundWebhookSequencesResponse::fromJson($json);
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
     * Returns aggregated engagement metrics plus a live active/waiting enrollment breakdown by current node for a specific sequence. This is an alias for /metrics/sequences/{sequenceId}.
     *
     * Example:
     * ```php
     * $client->sequences->getStats(
     *     'sequenceId',
     *     new GetStatsSequencesRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param GetStatsSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetStatsSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getStats(string $sequenceId, GetStatsSequencesRequest $request = new GetStatsSequencesRequest(), ?array $options = null): ?GetStatsSequencesResponse
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
                    path: "sequences/{$sequenceId}/stats",
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
                return GetStatsSequencesResponse::fromJson($json);
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
     * Returns filtered, paginated automation sequences for the authenticated company.
     *
     * Example:
     * ```php
     * $client->sequences->list(
     *     new ListSequencesRequest([]),
     * );
     * ```
     *
     * @param ListSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListSequencesRequest $request = new ListSequencesRequest(), ?array $options = null): ?ListSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->labels != null) {
            $query['labels'] = $request->labels;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences",
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
                return ListSequencesResponse::fromJson($json);
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
     * Lists the individual contacts enrolled in one sequence, with the node each one is currently sitting on. Defaults to active and waiting enrollments. Use this when sequence stats give you enrollmentCounts and you need the actual subscribers behind a number.
     *
     * Example:
     * ```php
     * $client->sequences->listEnrollments(
     *     'sequenceId',
     *     new ListEnrollmentsSequencesRequest([
     *         'currentNodeId' => 'node_wave_1',
     *         'email' => 'customer@example.com',
     *         'status' => 'waiting',
     *         'subscriberId' => 'sub_abc123',
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param ListEnrollmentsSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceEnrollmentListResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listEnrollments(string $sequenceId, ListEnrollmentsSequencesRequest $request = new ListEnrollmentsSequencesRequest(), ?array $options = null): ?SequenceEnrollmentListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->currentNodeId != null) {
            $query['currentNodeId'] = $request->currentNodeId;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->sort != null) {
            $query['sort'] = $request->sort;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->stopConditionMatch != null) {
            $query['stopConditionMatch'] = $request->stopConditionMatch;
        }
        if ($request->subscriberId != null) {
            $query['subscriberId'] = $request->subscriberId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enrollments",
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
                return SequenceEnrollmentListResponse::fromJson($json);
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
     * Lists the conversion goals configured for a sequence.
     *
     * Example:
     * ```php
     * $client->sequences->listGoals(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListGoalsSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listGoals(string $sequenceId, ?array $options = null): ?ListGoalsSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/goals",
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
                return ListGoalsSequencesResponse::fromJson($json);
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
     * Releases a bounded batch of contacts off one sequence step and onto another, keeping their existing enrollment, entry event properties, and stop-condition snapshots. Moved contacts become active on the target step immediately. Defaults to a dry run; each call is capped at 500 and is never drained automatically, so repeat the request while remainingCount is above zero. Works while new enrollment is paused, because the contacts are already enrolled.
     *
     * Example:
     * ```php
     * $client->sequences->moveEnrollments(
     *     'sequenceId',
     *     new SequenceEnrollmentMoveRequest([
     *         'fromNodeId' => 'node_delay_2',
     *         'limit' => 180,
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param SequenceEnrollmentMoveRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceEnrollmentMoveResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function moveEnrollments(string $sequenceId, SequenceEnrollmentMoveRequest $request, ?array $options = null): ?SequenceEnrollmentMoveResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enrollments/move",
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
                return SequenceEnrollmentMoveResponse::fromJson($json);
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
     * Stops new subscribers from entering an active sequence while current recipients continue through the sequence.
     *
     * Example:
     * ```php
     * $client->sequences->pauseEnrollments(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceActionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function pauseEnrollments(string $sequenceId, ?array $options = null): ?SequenceActionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/pause-enrollments",
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
                return SequenceActionResponse::fromJson($json);
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
     * Pulls waiting enrollments forward to the start of the sequence sending window on the day they are already scheduled for. Changing a sending window leaves existing waits alone, so a widened window never reaches contacts already parked on an email-bound delay step and a narrowed one defers them to the next allowed day. Sequence windows never advance SMS, webhooks, branches, or other non-email actions. A wait only ever moves earlier, never onto a different local day, and never before now. Nobody is cancelled or re-enrolled. Defaults to a synchronous dry run; set dryRun false to queue a background apply job, then poll its status endpoint. Each job is capped at 1000 enrollments; when the completed result has hasMore true, pass nextCursor as cursor on the next request.
     *
     * Example:
     * ```php
     * $client->sequences->realignEnrollments(
     *     'sequenceId',
     *     new SequenceEnrollmentRealignRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param SequenceEnrollmentRealignRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceEnrollmentRealignResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function realignEnrollments(string $sequenceId, SequenceEnrollmentRealignRequest $request = new SequenceEnrollmentRealignRequest(), ?array $options = null): ?SequenceEnrollmentRealignResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/enrollments/realign-sending-window",
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
                return SequenceEnrollmentRealignResponse::fromJson($json);
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
     * Render one sequence email step to the exact email-safe HTML that would be sent, for embedding a visual preview. Read-only: this never sends or modifies anything, and uses POST only so personalization input can travel in a request body.
     *
     * Example:
     * ```php
     * $client->sequences->renderStep(
     *     'sequenceId',
     *     'nodeId',
     *     new RenderStepSequencesRequest([
     *         'body' => new RenderEmailRequest([]),
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param string $nodeId Email step node ID
     * @param RenderStepSequencesRequest $request
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
    public function renderStep(string $sequenceId, string $nodeId, RenderStepSequencesRequest $request, ?array $options = null): ?RenderEmailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/nodes/{$nodeId}/render",
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
     * Reopens new enrollments for an active sequence whose enrollment gate was paused. Use enableSequence for a fully disabled sequence.
     *
     * Example:
     * ```php
     * $client->sequences->resumeEnrollments(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SequenceActionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function resumeEnrollments(string $sequenceId, ?array $options = null): ?SequenceActionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/resume-enrollments",
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
                return SequenceActionResponse::fromJson($json);
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
     * Immediately invalidates the previous URL and returns the replacement endpoint.
     *
     * Example:
     * ```php
     * $client->sequences->rotateInboundWebhookSecret(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RotateInboundWebhookSecretSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function rotateInboundWebhookSecret(string $sequenceId, ?array $options = null): ?RotateInboundWebhookSecretSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/inbound-webhook/rotate-secret",
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
                return RotateInboundWebhookSecretSequencesResponse::fromJson($json);
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
     * Queues a real test email for one saved action_email sequence step to one or more internal reviewers. action_ab_test steps are not supported; inspect their variants on the sequence detail emails[].abTest.variants payload. The sequence is not activated and no subscribers are enrolled. Returns one durable email send ID per recipient for delivery inspection.
     *
     * Example:
     * ```php
     * $client->sequences->sendTestEmail(
     *     'sequenceId',
     *     'nodeId',
     *     new SendTestEmailSequencesRequest([
     *         'recipients' => [
     *             'recipients',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID containing the email step.
     * @param string $nodeId action_email step node ID returned by the sequence detail endpoint. Do not pass an action_ab_test node.
     * @param SendTestEmailSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SendTestEmailSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function sendTestEmail(string $sequenceId, string $nodeId, SendTestEmailSequencesRequest $request, ?array $options = null): ?SendTestEmailSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/nodes/{$nodeId}/test",
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
                return SendTestEmailSequencesResponse::fromJson($json);
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
     * Dry-runs a sequence without sending mail or enrolling anyone. Activating does not auto-enroll anyone. Without a subscriber this reports who currently matches and activation readiness errors. Pass subscriberId or email to also walk that stored contact's branch path. Always requires both sequences:read and subscribers:read because results include contact samples.
     *
     * Example:
     * ```php
     * $client->sequences->simulate(
     *     'sequenceId',
     *     new SimulateSequencesRequest([]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param SimulateSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SimulateSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function simulate(string $sequenceId, SimulateSequencesRequest $request = new SimulateSequencesRequest(), ?array $options = null): ?SimulateSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->subscriberId != null) {
            $query['subscriberId'] = $request->subscriberId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/simulate",
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
                return SimulateSequencesResponse::fromJson($json);
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
     * Restores an archived sequence as a disabled draft for review.
     *
     * Example:
     * ```php
     * $client->sequences->unarchive(
     *     'sequenceId',
     * );
     * ```
     *
     * @param string $sequenceId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UnarchiveSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function unarchive(string $sequenceId, ?array $options = null): ?UnarchiveSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/unarchive",
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
                return UnarchiveSequencesResponse::fromJson($json);
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
     * Updates sequence settings and content, inserts linear or branching steps, or performs revision-guarded graph edits.
     *
     * Example:
     * ```php
     * $client->sequences->update(
     *     'sequenceId',
     *     new SequenceUpdateRequest([
     *         'name' => 'Updated Welcome Sequence',
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId Sequence ID
     * @param SequenceUpdateRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $sequenceId, SequenceUpdateRequest $request = new SequenceUpdateRequest(), ?array $options = null): ?UpdateSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}",
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
                return UpdateSequencesResponse::fromJson($json);
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
     * Replaces the editable configuration for an existing sequence goal.
     *
     * Example:
     * ```php
     * $client->sequences->updateGoal(
     *     'sequenceId',
     *     'goalId',
     *     new UpdateGoalSequencesRequest([
     *         'body' => new SequenceGoalInput([]),
     *     ]),
     * );
     * ```
     *
     * @param string $sequenceId
     * @param string $goalId
     * @param UpdateGoalSequencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateGoalSequencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateGoal(string $sequenceId, string $goalId, UpdateGoalSequencesRequest $request, ?array $options = null): ?UpdateGoalSequencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sequences/{$sequenceId}/goals/{$goalId}",
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
                return UpdateGoalSequencesResponse::fromJson($json);
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
