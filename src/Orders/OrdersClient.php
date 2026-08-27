<?php

namespace Sequenzy\Orders;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Orders\Requests\PushOrdersRequest;
use Sequenzy\Orders\Types\PushOrdersResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Orders\Requests\TrackCheckoutStartedRequest;
use Sequenzy\Orders\Types\TrackCheckoutStartedResponse;

class OrdersClient
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
     * Pushes a normalized order from any e-commerce platform. Triggers the matching ecommerce.* event (order placed, cancelled, fulfilled, or refunded), updates the customer's revenue attributes (ltv, totalSpent, ordersCount, aov), cancels superseded commerce automations, and schedules replenishment reminders. Processing is asynchronous.
     *
     * Example:
     * ```php
     * $client->orders->push(
     *     new PushOrdersRequest([
     *         'currency' => 'USD',
     *         'customer' => new CommerceCustomer([
     *             'email' => 'buyer@example.com',
     *         ]),
     *         'orderId' => 'order-1001',
     *         'totalCents' => 8850,
     *     ]),
     * );
     * ```
     *
     * @param PushOrdersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PushOrdersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function push(PushOrdersRequest $request, ?array $options = null): ?PushOrdersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "orders",
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
                return PushOrdersResponse::fromJson($json);
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
     * Tracks a started checkout and triggers the ecommerce.checkout_started event, which can power abandoned checkout automations.
     *
     * Example:
     * ```php
     * $client->orders->trackCheckoutStarted(
     *     new TrackCheckoutStartedRequest([
     *         'checkoutId' => 'checkout-abc123',
     *         'customer' => new CommerceCustomer([
     *             'email' => 'buyer@example.com',
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param TrackCheckoutStartedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TrackCheckoutStartedResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function trackCheckoutStarted(TrackCheckoutStartedRequest $request, ?array $options = null): ?TrackCheckoutStartedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "checkouts",
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
                return TrackCheckoutStartedResponse::fromJson($json);
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
