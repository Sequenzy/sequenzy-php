<?php

namespace Sequenzy\References;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\References\Requests\ListEmailReferencesRequest;
use Sequenzy\References\Types\ListEmailReferencesResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class ReferencesClient
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
     * Lists real emails (and, for sequences, whole sequences) from the Sequenzy email gallery to model a new email on, for the kind of email you are creating. By default they come from the gallery brands most like you, ranked by how close their best-matching emails are in meaning to your company description, closest first (rankings are reused for up to 10 minutes; a description change counts at once). Each `url` works with the from-example endpoints. Always empty when the gallery is not available. Requires `templates:read`.
     *
     * Example:
     * ```php
     * $client->references->listEmailReferences(
     *     new ListEmailReferencesRequest([
     *         'kind' => ListEmailReferencesRequestKind::Campaign->value,
     *     ]),
     * );
     * ```
     *
     * @param ListEmailReferencesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailReferencesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listEmailReferences(ListEmailReferencesRequest $request, ?array $options = null): ?ListEmailReferencesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['kind'] = $request->kind;
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->q != null) {
            $query['q'] = $request->q;
        }
        if ($request->scope != null) {
            $query['scope'] = $request->scope;
        }
        if ($request->subtype != null) {
            $query['subtype'] = $request->subtype;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "references",
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
                return ListEmailReferencesResponse::fromJson($json);
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
