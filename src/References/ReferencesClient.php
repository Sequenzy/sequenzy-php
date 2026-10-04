<?php

namespace Sequenzy\References;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\References\Requests\CreateGalleryBrandRequestRequest;
use Sequenzy\Types\GalleryBrandRequestResult;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\References\Types\DeleteGalleryBrandRequestResponse;
use Sequenzy\References\Requests\ListEmailReferencesRequest;
use Sequenzy\References\Types\ListEmailReferencesResponse;
use Sequenzy\References\Types\ListGalleryBrandRequestsResponse;

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
     * Asks for a brand, usually a competitor, to be added to the Sequenzy email gallery, the same as **Suggest a brand** in the dashboard's gallery picker. Asking again for the same domain keeps the one request (a new `note` replaces the old) and returns 200 with `created` false, so retries never duplicate. If the brand is already in the gallery, the request comes back with status `available`. Requires `templates:write`.
     *
     * Example:
     * ```php
     * $client->references->createGalleryBrandRequest(
     *     new CreateGalleryBrandRequestRequest([
     *         'website' => 'website',
     *     ]),
     * );
     * ```
     *
     * @param CreateGalleryBrandRequestRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GalleryBrandRequestResult
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createGalleryBrandRequest(CreateGalleryBrandRequestRequest $request, ?array $options = null): ?GalleryBrandRequestResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "gallery/brand-requests",
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
                return GalleryBrandRequestResult::fromJson($json);
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
     * Withdraws one of your brand requests. A brand already added to the gallery stays there. Requires `templates:write`.
     *
     * Example:
     * ```php
     * $client->references->deleteGalleryBrandRequest(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteGalleryBrandRequestResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteGalleryBrandRequest(string $id, ?array $options = null): ?DeleteGalleryBrandRequestResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "gallery/brand-requests/{$id}",
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
                return DeleteGalleryBrandRequestResponse::fromJson($json);
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

    /**
     * Lists your requests to add brands (usually competitors) to the Sequenzy email gallery, newest first, with where each one stands. A request moves from `requested` to `collecting` once the brand is added to the gallery, then to `available` once its emails are in the gallery, when `brand.url` links to them and [List Email References](/api-reference/references/list) can return them. Requests are private to your company. Requires `templates:read`.
     *
     * Example:
     * ```php
     * $client->references->listGalleryBrandRequests();
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
     * @return ?ListGalleryBrandRequestsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listGalleryBrandRequests(?array $options = null): ?ListGalleryBrandRequestsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "gallery/brand-requests",
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
                return ListGalleryBrandRequestsResponse::fromJson($json);
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
