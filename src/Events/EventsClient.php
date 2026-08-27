<?php

namespace Sequenzy\Events;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Events\Requests\GetSchemasEventsRequest;
use Sequenzy\Events\Types\GetSchemasEventsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

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
     * Returns the published payload of a built-in event - a real example payload per provider, plus every property path with its type, the merge tag that resolves it, and a description wherever the example alone is ambiguous (a null sample, an empty list, a unit that is not obvious, or a type that differs per provider). Omit eventName to list every documented event. Static reference data describing the shape of an event, not what the account has received. An event with no published payload returns documented false; it is still valid to trigger and to build a sequence on, because custom events carry exactly the properties you send.
     *
     * Example:
     * ```php
     * $client->events->getSchemas(
     *     new GetSchemasEventsRequest([]),
     * );
     * ```
     *
     * @param GetSchemasEventsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSchemasEventsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSchemas(GetSchemasEventsRequest $request = new GetSchemasEventsRequest(), ?array $options = null): ?GetSchemasEventsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->eventName != null) {
            $query['eventName'] = $request->eventName;
        }
        if ($request->provider != null) {
            $query['provider'] = $request->provider;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "events/schemas",
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
                return GetSchemasEventsResponse::fromJson($json);
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
