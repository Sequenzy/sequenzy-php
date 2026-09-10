<?php

namespace Sequenzy\EmailBlocks;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\EmailBlocks\Requests\GetEmailBlocksRequest;
use Sequenzy\EmailBlocks\Types\GetEmailBlocksResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\EmailBlocks\Requests\ListEmailBlocksRequest;
use Sequenzy\EmailBlocks\Types\ListEmailBlocksResponse;

class EmailBlocksClient
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
     * Returns the full field reference for one block type, with a minimal valid example and authoring notes. For line-items, includes optional itemFields mappings from display fields to relative dotted paths within each item. Omitted or blank mappings use standard field names. Mapping values must be strings of at most 200 characters.
     *
     * Example:
     * ```php
     * $client->emailBlocks->get(
     *     'steps',
     *     new GetEmailBlocksRequest([]),
     * );
     * ```
     *
     * @param string $type Block type, for example list, steps, text, or hero.
     * @param GetEmailBlocksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetEmailBlocksResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $type, GetEmailBlocksRequest $request = new GetEmailBlocksRequest(), ?array $options = null): ?GetEmailBlocksResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->conditionFields != null) {
            $query['conditionFields'] = $request->conditionFields;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-blocks/{$type}",
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
                return GetEmailBlocksResponse::fromJson($json);
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
     * Lists every block type accepted by the `blocks` array on campaigns, sequence email steps, templates, transactional emails, and email components, with the required and optional fields of each. Derived from the same schemas that validate a write, so it cannot drift from what those endpoints accept.
     *
     * Example:
     * ```php
     * $client->emailBlocks->list(
     *     new ListEmailBlocksRequest([]),
     * );
     * ```
     *
     * @param ListEmailBlocksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailBlocksResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListEmailBlocksRequest $request = new ListEmailBlocksRequest(), ?array $options = null): ?ListEmailBlocksResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->creatableOnly != null) {
            $query['creatableOnly'] = $request->creatableOnly;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-blocks",
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
                return ListEmailBlocksResponse::fromJson($json);
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
