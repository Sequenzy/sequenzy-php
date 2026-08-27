<?php

namespace Sequenzy\Suppressions;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Suppressions\Requests\GetSuppressionsRequest;
use Sequenzy\Suppressions\Types\GetSuppressionsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Suppressions\Requests\ListSuppressionsRequest;
use Sequenzy\Suppressions\Types\ListSuppressionsResponse;
use Sequenzy\Suppressions\Requests\RemoveSuppressionsRequest;
use Sequenzy\Suppressions\Types\RemoveSuppressionsResponse;

class SuppressionsClient
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
     * Checks one exact recipient against Sequenzy's local bounce and complaint safeguards and the regional Amazon SES account-level suppression list. The lookup does not expose unrelated recipients from the shared SES account.
     *
     * Example:
     * ```php
     * $client->suppressions->get(
     *     'email',
     *     new GetSuppressionsRequest([
     *         'region' => 'us-east-1',
     *     ]),
     * );
     * ```
     *
     * @param string $email Exact recipient email address
     * @param GetSuppressionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSuppressionsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $email, GetSuppressionsRequest $request = new GetSuppressionsRequest(), ?array $options = null): ?GetSuppressionsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->region != null) {
            $query['region'] = $request->region;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "suppressions/{$email}",
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
                return GetSuppressionsResponse::fromJson($json);
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
     * Lists the recipients this company cannot reach, newest suppression first by default.
     *
     * Four product-level suppression types appear:
     *
     * - `suppressionType: invalid_recipient` - SMTP evidence conclusively identifies an invalid destination. It is global, visible to companies associated with the address, and protected.
     * - `suppressionType: unknown_hard_bounce` - a permanent/undetermined failure without enough evidence to declare the inbox invalid. It is company-scoped and protected.
     * - `suppressionType: soft_bounce_escalation` - repeated delivery failures from this company. It is company-scoped and removable.
     * - `suppressionType: complaint` - the recipient reported this company's email as spam. It is company-scoped and protected.
     *
     * The platform-wide list is never exposed: a global row is returned only when the address is already associated with the authenticated company.
     *
     * Example:
     * ```php
     * $client->suppressions->list(
     *     new ListSuppressionsRequest([]),
     * );
     * ```
     *
     * @param ListSuppressionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSuppressionsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListSuppressionsRequest $request = new ListSuppressionsRequest(), ?array $options = null): ?ListSuppressionsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->order != null) {
            $query['order'] = $request->order;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->sort != null) {
            $query['sort'] = $request->sort;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "suppressions",
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
                return ListSuppressionsResponse::fromJson($json);
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
     * Removes one company-associated recipient's workspace-scoped soft-bounce escalation and reactivates a bounced company subscriber. Global invalid-recipient and Amazon SES account-level suppressions, other companies' scoped rows, complaints, and unsubscribes are protected.
     *
     * Example:
     * ```php
     * $client->suppressions->remove(
     *     'email',
     *     new RemoveSuppressionsRequest([
     *         'region' => 'us-east-1',
     *     ]),
     * );
     * ```
     *
     * @param string $email Exact company-associated recipient email address
     * @param RemoveSuppressionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RemoveSuppressionsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function remove(string $email, RemoveSuppressionsRequest $request = new RemoveSuppressionsRequest(), ?array $options = null): ?RemoveSuppressionsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->region != null) {
            $query['region'] = $request->region;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "suppressions/{$email}",
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
                return RemoveSuppressionsResponse::fromJson($json);
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
