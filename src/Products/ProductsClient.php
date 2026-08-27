<?php

namespace Sequenzy\Products;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Products\Requests\AttachDeliveryProductsRequest;
use Sequenzy\Products\Types\AttachDeliveryProductsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Products\Requests\CreateDeliveryUploadUrlProductsRequest;
use Sequenzy\Products\Types\CreateDeliveryUploadUrlProductsResponse;
use Sequenzy\Products\Types\DeleteProductsResponse;
use Sequenzy\Products\Types\GetProductsResponse;
use Sequenzy\Products\Requests\ListProductsRequest;
use Sequenzy\Products\Types\ListProductsResponse;
use Sequenzy\Products\Requests\RegisterBackInStockRequest;
use Sequenzy\Products\Types\RegisterBackInStockResponse;
use Sequenzy\Products\Types\RemoveDeliveryProductsResponse;
use Sequenzy\Products\Requests\SyncStripeProductsRequest;
use Sequenzy\Products\Types\SyncStripeProductsResponse;
use Sequenzy\Products\Requests\UpsertProductsRequest;
use Sequenzy\Products\Types\UpsertProductsResponse;

class ProductsClient
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
     * Attaches the distributable file delivered after a purchase of this product. Purchase events then expose it as download.url / download.name. Accepts the internal product id or, for Commerce API products, your productId.
     *
     * Example:
     * ```php
     * $client->products->attachDelivery(
     *     'productId',
     *     new AttachDeliveryProductsRequest([
     *         'url' => 'url',
     *     ]),
     * );
     * ```
     *
     * @param string $productId Internal product id, or your own productId for products pushed via the Commerce API.
     * @param AttachDeliveryProductsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AttachDeliveryProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function attachDelivery(string $productId, AttachDeliveryProductsRequest $request, ?array $options = null): ?AttachDeliveryProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products/{$productId}/delivery",
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
                return AttachDeliveryProductsResponse::fromJson($json);
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
     * Returns a presigned URL to upload a distributable file. PUT the file bytes to uploadUrl, then attach publicUrl to a product.
     *
     * Example:
     * ```php
     * $client->products->createDeliveryUploadUrl(
     *     new CreateDeliveryUploadUrlProductsRequest([
     *         'contentType' => 'application/pdf',
     *         'filename' => 'filename',
     *         'fileSizeBytes' => 1,
     *     ]),
     * );
     * ```
     *
     * @param CreateDeliveryUploadUrlProductsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateDeliveryUploadUrlProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createDeliveryUploadUrl(CreateDeliveryUploadUrlProductsRequest $request, ?array $options = null): ?CreateDeliveryUploadUrlProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products/delivery/upload-url",
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
                return CreateDeliveryUploadUrlProductsResponse::fromJson($json);
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
     * Deletes a product previously pushed via the Commerce API, identified by your productId. Products synced from other providers are not affected.
     *
     * Example:
     * ```php
     * $client->products->delete(
     *     'productId',
     * );
     * ```
     *
     * @param string $productId Your product identifier
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $productId, ?array $options = null): ?DeleteProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products/{$productId}",
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
                return DeleteProductsResponse::fromJson($json);
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
     * Returns a product previously pushed via the Commerce API, identified by your productId.
     *
     * Example:
     * ```php
     * $client->products->get(
     *     'productId',
     * );
     * ```
     *
     * @param string $productId Your product identifier
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $productId, ?array $options = null): ?GetProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products/{$productId}",
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
                return GetProductsResponse::fromJson($json);
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
     * Lists products in the catalog. Includes products synced from Stripe, Shopify/WooCommerce, and products pushed via the Commerce API.
     *
     * Example:
     * ```php
     * $client->products->list(
     *     new ListProductsRequest([]),
     * );
     * ```
     *
     * @param ListProductsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListProductsRequest $request = new ListProductsRequest(), ?array $options = null): ?ListProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->provider != null) {
            $query['provider'] = $request->provider;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products",
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
                return ListProductsResponse::fromJson($json);
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
     * Registers a customer's request to be notified when a product (pushed via the Commerce API) is back in stock. When a later product upsert marks the product or variant in stock again, the ecommerce.back_in_stock event fires for waiting subscribers.
     *
     * Example:
     * ```php
     * $client->products->registerBackInStock(
     *     new RegisterBackInStockRequest([
     *         'customer' => new CommerceCustomer([
     *             'email' => 'buyer@example.com',
     *         ]),
     *         'productId' => 'SKU-PROTEIN-1KG',
     *     ]),
     * );
     * ```
     *
     * @param RegisterBackInStockRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RegisterBackInStockResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function registerBackInStock(RegisterBackInStockRequest $request, ?array $options = null): ?RegisterBackInStockResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "back-in-stock",
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
                return RegisterBackInStockResponse::fromJson($json);
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
     * Removes the attached distributable file from a product. Accepts the internal product id or, for Commerce API products, your productId.
     *
     * Example:
     * ```php
     * $client->products->removeDelivery(
     *     'productId',
     * );
     * ```
     *
     * @param string $productId Internal product id, or your own productId for products pushed via the Commerce API.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RemoveDeliveryProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function removeDelivery(string $productId, ?array $options = null): ?RemoveDeliveryProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products/{$productId}/delivery",
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
                return RemoveDeliveryProductsResponse::fromJson($json);
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
     * Queues a sync of the Stripe product catalog into the products list. Requires an active Stripe integration with bulk sync enabled.
     *
     * Example:
     * ```php
     * $client->products->syncStripe(
     *     new SyncStripeProductsRequest([]),
     * );
     * ```
     *
     * @param SyncStripeProductsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SyncStripeProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function syncStripe(SyncStripeProductsRequest $request = new SyncStripeProductsRequest(), ?array $options = null): ?SyncStripeProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->integrationId != null) {
            $query['integrationId'] = $request->integrationId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products/sync",
                    method: HttpMethod::POST,
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
                return SyncStripeProductsResponse::fromJson($json);
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
     * Creates or updates up to 100 products, keyed by your productId. Products pushed here behave like Shopify/WooCommerce products - they power product blocks, replenishment reminders, and back-in-stock notifications. Stock transitions trigger back-in-stock events for waiting subscribers. Updates are partial - omitted optional fields keep their stored values; pass an explicit null to clear one.
     *
     * Example:
     * ```php
     * $client->products->upsert(
     *     new UpsertProductsRequest([
     *         'products' => [
     *             new UpsertProductsRequestProductsItem([
     *                 'productId' => 'SKU-PROTEIN-1KG',
     *                 'title' => 'Protein Powder',
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param UpsertProductsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpsertProductsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function upsert(UpsertProductsRequest $request, ?array $options = null): ?UpsertProductsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "products",
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
                return UpsertProductsResponse::fromJson($json);
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
