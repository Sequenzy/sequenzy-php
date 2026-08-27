<?php

namespace Sequenzy\Subscribers\Events;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Subscribers\Events\Requests\TriggerEventsRequest;
use Sequenzy\Subscribers\Events\Types\TriggerEventsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Subscribers\Events\Requests\TriggerBulkEventsRequest;
use Sequenzy\Subscribers\Events\Types\TriggerBulkEventsResponse;

class EventsClient
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
     * Triggers an event for a subscriber. Creates the subscriber if they don't exist and applies the workspace default lists setting. Creates the event definition if it doesn't exist. When the workspace has double opt-in enabled, a brand-new subscriber is created pending confirmation, the confirmation email is queued, and matching sequences wait at their trigger until the subscriber confirms.
     *
     * Example:
     * ```php
     * $client->subscribers->events->trigger(
     *     new TriggerEventsRequest([
     *         'event' => 'purchase.completed',
     *     ]),
     * );
     * ```
     *
     * @param TriggerEventsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TriggerEventsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function trigger(TriggerEventsRequest $request, ?array $options = null): ?TriggerEventsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/events",
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
                return TriggerEventsResponse::fromJson($json);
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
     * Triggers multiple events for a subscriber. Creates the subscriber if they don't exist and applies the workspace default lists setting. Creates event definitions if they don't exist. Events are processed independently, so an error response may still include events that were already triggered. When the workspace has double opt-in enabled, a brand-new subscriber is created pending confirmation, a single confirmation email is queued for the request, and matching sequences wait at their trigger until the subscriber confirms.
     *
     * Example:
     * ```php
     * $client->subscribers->events->triggerBulk(
     *     new TriggerBulkEventsRequest([
     *         'events' => [
     *             new TriggerBulkEventsRequestEventsItem([
     *                 'name' => 'page.viewed',
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param TriggerBulkEventsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TriggerBulkEventsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function triggerBulk(TriggerBulkEventsRequest $request, ?array $options = null): ?TriggerBulkEventsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/events/bulk",
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
                return TriggerBulkEventsResponse::fromJson($json);
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
