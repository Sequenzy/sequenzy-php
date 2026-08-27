<?php

namespace Sequenzy\AbTests;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\AbTests\Requests\AddVariantAbTestsRequest;
use Sequenzy\AbTests\Types\AddVariantAbTestsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\AbTests\Requests\CreateAbTestsRequest;
use Sequenzy\AbTests\Types\CreateAbTestsResponse;
use Sequenzy\AbTests\Types\DeleteAbTestsResponse;
use Sequenzy\AbTests\Requests\DeleteVariantAbTestsRequest;
use Sequenzy\AbTests\Types\DeleteVariantAbTestsResponse;
use Sequenzy\AbTests\Types\GetAbTestsResponse;
use Sequenzy\AbTests\Requests\GetStatsAbTestsRequest;
use Sequenzy\AbTests\Types\GetStatsAbTestsResponse;
use Sequenzy\Core\Json\JsonSerializer;
use Sequenzy\AbTests\Requests\ListAbTestsRequest;
use Sequenzy\AbTests\Types\ListAbTestsResponse;
use Sequenzy\AbTests\Requests\RestartAbTestsRequest;
use Sequenzy\AbTests\Types\RestartAbTestsResponse;
use Sequenzy\AbTests\Requests\UpdateAbTestsRequest;
use Sequenzy\AbTests\Types\UpdateAbTestsResponse;
use Sequenzy\AbTests\Requests\UpdateVariantAbTestsRequest;
use Sequenzy\AbTests\Types\UpdateVariantAbTestsResponse;

class AbTestsClient
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
     * Adds a variant to a draft campaign or sequence A/B test. Sequence variants receive an independent email template. The body defaults to the control email when blocks are omitted. Sequence tests whose parent sequence is active require confirmLiveChange.
     *
     * Example:
     * ```php
     * $client->abTests->addVariant(
     *     'abTestId',
     *     new AddVariantAbTestsRequest([
     *         'subject' => 'subject',
     *     ]),
     * );
     * ```
     *
     * @param string $abTestId A/B test ID.
     * @param AddVariantAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AddVariantAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function addVariant(string $abTestId, AddVariantAbTestsRequest $request, ?array $options = null): ?AddVariantAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests/{$abTestId}/variants",
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
                return AddVariantAbTestsResponse::fromJson($json);
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
     * Creates a draft campaign A/B test or converts a sequence email node to action_ab_test. Provide exactly one owner. Variant A is copied into an independent email for sequences; sequence conversions require at least one extra variant.
     *
     * Example:
     * ```php
     * $client->abTests->create(
     *     new CreateAbTestsRequest([]),
     * );
     * ```
     *
     * @param CreateAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateAbTestsRequest $request = new CreateAbTestsRequest(), ?array $options = null): ?CreateAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests",
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
                return CreateAbTestsResponse::fromJson($json);
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
     * Deletes a campaign A/B test and its variants. Running tests cannot be deleted, and the linked campaign must be in draft or rejected status.
     *
     * Example:
     * ```php
     * $client->abTests->delete(
     *     'abTestId',
     * );
     * ```
     *
     * @param string $abTestId A/B test ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $abTestId, ?array $options = null): ?DeleteAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests/{$abTestId}",
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
                return DeleteAbTestsResponse::fromJson($json);
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
     * Removes a variant from a draft campaign or sequence A/B test. The control variant A cannot be deleted, and at least 2 variants must remain. Deleting a sequence variant also deletes its dedicated email template; sequence tests whose parent sequence is active require confirmLiveChange.
     *
     * Example:
     * ```php
     * $client->abTests->deleteVariant(
     *     'abTestId',
     *     'variantId',
     *     new DeleteVariantAbTestsRequest([]),
     * );
     * ```
     *
     * @param string $abTestId A/B test ID.
     * @param string $variantId Variant ID.
     * @param DeleteVariantAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteVariantAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteVariant(string $abTestId, string $variantId, DeleteVariantAbTestsRequest $request = new DeleteVariantAbTestsRequest(), ?array $options = null): ?DeleteVariantAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->confirmLiveChange != null) {
            $query['confirmLiveChange'] = $request->confirmLiveChange;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests/{$abTestId}/variants/{$variantId}",
                    method: HttpMethod::DELETE,
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
                return DeleteVariantAbTestsResponse::fromJson($json);
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
     * Returns one A/B test with variants and variant localization status.
     *
     * Example:
     * ```php
     * $client->abTests->get(
     *     'abTestId',
     * );
     * ```
     *
     * @param string $abTestId A/B test ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $abTestId, ?array $options = null): ?GetAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests/{$abTestId}",
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
                return GetAbTestsResponse::fromJson($json);
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
     * Returns aggregate and per-variant engagement stats for an A/B test.
     *
     * Example:
     * ```php
     * $client->abTests->getStats(
     *     'abTestId',
     *     new GetStatsAbTestsRequest([]),
     * );
     * ```
     *
     * @param string $abTestId A/B test ID.
     * @param GetStatsAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetStatsAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getStats(string $abTestId, GetStatsAbTestsRequest $request = new GetStatsAbTestsRequest(), ?array $options = null): ?GetStatsAbTestsResponse
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
                    path: "ab-tests/{$abTestId}/stats",
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
                return GetStatsAbTestsResponse::fromJson($json);
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
     * Lists A/B tests and variants for the authenticated company, optionally filtered by sequence.
     *
     * Example:
     * ```php
     * $client->abTests->list(
     *     new ListAbTestsRequest([]),
     * );
     * ```
     *
     * @param ListAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListAbTestsRequest $request = new ListAbTestsRequest(), ?array $options = null): ?ListAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->sequenceId != null) {
            $query['sequenceId'] = $request->sequenceId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests",
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
                return ListAbTestsResponse::fromJson($json);
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
     * Starts a new draft sequence A/B test from the selected control variant after a winner has been selected. The new test becomes active after generated variants are ready.
     *
     * Example:
     * ```php
     * $client->abTests->restart(
     *     'abTestId',
     *     new RestartAbTestsRequest([]),
     * );
     * ```
     *
     * @param string $abTestId A/B test ID to restart.
     * @param RestartAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RestartAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function restart(string $abTestId, RestartAbTestsRequest $request = new RestartAbTestsRequest(), ?array $options = null): ?RestartAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests/{$abTestId}/restart",
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
                return RestartAbTestsResponse::fromJson($json);
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
     * Updates a draft campaign test or the effective settings for a sequence test. Campaigns use testPercentage and testDurationMinutes; sequences use testType and winnerThreshold. Sequence changes that affect a live or already-used test require confirmLiveChange.
     *
     * Example:
     * ```php
     * $client->abTests->update(
     *     'abTestId',
     *     new UpdateAbTestsRequest([]),
     * );
     * ```
     *
     * @param string $abTestId A/B test ID.
     * @param UpdateAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $abTestId, UpdateAbTestsRequest $request = new UpdateAbTestsRequest(), ?array $options = null): ?UpdateAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests/{$abTestId}",
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
                return UpdateAbTestsResponse::fromJson($json);
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
     * Updates an A/B test variant's subject, preview text, or body content. Campaign variants remain editable only while the test is in draft. Sequence variants can be edited later with confirmLiveChange when the sequence is active, the test is no longer a draft, or the test has recorded activity; earlier sends remain unchanged, so combined results may no longer be accurate.
     *
     * Example:
     * ```php
     * $client->abTests->updateVariant(
     *     'abTestId',
     *     'variantId',
     *     new UpdateVariantAbTestsRequest([]),
     * );
     * ```
     *
     * @param string $abTestId A/B test ID.
     * @param string $variantId Variant ID.
     * @param UpdateVariantAbTestsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateVariantAbTestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateVariant(string $abTestId, string $variantId, UpdateVariantAbTestsRequest $request = new UpdateVariantAbTestsRequest(), ?array $options = null): ?UpdateVariantAbTestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "ab-tests/{$abTestId}/variants/{$variantId}",
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
                return UpdateVariantAbTestsResponse::fromJson($json);
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
