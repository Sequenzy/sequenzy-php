<?php

namespace Sequenzy\Conversations;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Conversations\Requests\BulkUpdateStatusConversationsRequest;
use Sequenzy\Conversations\Types\BulkUpdateStatusConversationsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Conversations\Requests\ForwardMessageConversationsRequest;
use Sequenzy\Conversations\Types\ForwardMessageConversationsResponse;
use Sequenzy\Conversations\Types\GetConversationsResponse;
use Sequenzy\Conversations\Types\GetInboxAddressResponse;
use Sequenzy\Conversations\Requests\ListConversationsRequest;
use Sequenzy\Conversations\Types\ListConversationsResponse;
use Sequenzy\Conversations\Types\MarkReadConversationsResponse;
use Sequenzy\Conversations\Types\MarkUnreadConversationsResponse;
use Sequenzy\Conversations\Requests\SendMessageConversationsRequest;
use Sequenzy\Conversations\Types\SendMessageConversationsResponse;
use Sequenzy\Conversations\Requests\UpdateInboxAddressRequest;
use Sequenzy\Conversations\Types\UpdateInboxAddressResponse;
use Sequenzy\Conversations\Requests\UpdateStatusConversationsRequest;
use Sequenzy\Conversations\Types\UpdateStatusConversationsResponse;

class ConversationsClient
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
     * Opens or closes up to 100 conversations in one request. Only conversations whose status changes are updated, so retries are safe. IDs that do not exist in the company are reported in `notFoundIds` and do not fail the request.
     *
     * Example:
     * ```php
     * $client->conversations->bulkUpdateStatus(
     *     new BulkUpdateStatusConversationsRequest([
     *         'conversationIds' => [
     *             'conversationIds',
     *         ],
     *         'status' => BulkUpdateStatusConversationsRequestStatus::Open->value,
     *     ]),
     * );
     * ```
     *
     * @param BulkUpdateStatusConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BulkUpdateStatusConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function bulkUpdateStatus(BulkUpdateStatusConversationsRequest $request, ?array $options = null): ?BulkUpdateStatusConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/bulk/status",
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
                return BulkUpdateStatusConversationsResponse::fromJson($json);
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
     * Emails a copy of one received or sent message, with its stored attachments up to 15 MB in total (files left out are listed in the forwarded email), to another address. The forward is recorded in the conversation as a system message whose deliveryStatus moves from pending to sent or failed. It does not change the conversation's status, unread state, or last activity. Notes cannot be forwarded.
     *
     * Example:
     * ```php
     * $client->conversations->forwardMessage(
     *     'conversationId',
     *     'messageId',
     *     new ForwardMessageConversationsRequest([
     *         'to' => 'to',
     *     ]),
     * );
     * ```
     *
     * @param string $conversationId Conversation ID.
     * @param string $messageId ID of the message to forward.
     * @param ForwardMessageConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ForwardMessageConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function forwardMessage(string $conversationId, string $messageId, ForwardMessageConversationsRequest $request, ?array $options = null): ?ForwardMessageConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$conversationId}/messages/{$messageId}/forward",
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
                return ForwardMessageConversationsResponse::fromJson($json);
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
     * Returns one conversation with all messages, originating campaign or sequence context, and subscriber details. Stored attachments include a signed downloadUrl valid for one hour.
     *
     * Example:
     * ```php
     * $client->conversations->get(
     *     'conversationId',
     * );
     * ```
     *
     * @param string $conversationId Conversation ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $conversationId, ?array $options = null): ?GetConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$conversationId}",
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
                return GetConversationsResponse::fromJson($json);
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
     * Returns the address anyone can email to reach this company's inbox, the same address on verified custom inbound domains, whether receiving is on, whether attachments are stored, and how long received email is kept.
     *
     * Example:
     * ```php
     * $client->conversations->getInboxAddress();
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
     * @return ?GetInboxAddressResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInboxAddress(?array $options = null): ?GetInboxAddressResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/inbox-address",
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
                return GetInboxAddressResponse::fromJson($json);
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
     * Lists inbox conversations: replies to your campaigns, sequences, and transactional email, plus email sent to your inbox address. Filter by status, unread flag, or search term.
     *
     * Example:
     * ```php
     * $client->conversations->list(
     *     new ListConversationsRequest([]),
     * );
     * ```
     *
     * @param ListConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListConversationsRequest $request = new ListConversationsRequest(), ?array $options = null): ?ListConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->unread != null) {
            $query['unread'] = $request->unread;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations",
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
                return ListConversationsResponse::fromJson($json);
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
     * Marks all unread inbound messages in a conversation as read and clears the unread flag.
     *
     * Example:
     * ```php
     * $client->conversations->markRead(
     *     'conversationId',
     * );
     * ```
     *
     * @param string $conversationId Conversation ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MarkReadConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function markRead(string $conversationId, ?array $options = null): ?MarkReadConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$conversationId}/read",
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
                return MarkReadConversationsResponse::fromJson($json);
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
     * Sets the conversation's unread flag and marks its latest received message unread.
     *
     * Example:
     * ```php
     * $client->conversations->markUnread(
     *     'conversationId',
     * );
     * ```
     *
     * @param string $conversationId Conversation ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MarkUnreadConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function markUnread(string $conversationId, ?array $options = null): ?MarkUnreadConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$conversationId}/unread",
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
                return MarkUnreadConversationsResponse::fromJson($json);
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
     * Sends an email reply to the subscriber or adds an internal note. Replies reopen closed conversations.
     *
     * Example:
     * ```php
     * $client->conversations->sendMessage(
     *     'conversationId',
     *     new SendMessageConversationsRequest([]),
     * );
     * ```
     *
     * @param string $conversationId Conversation ID.
     * @param SendMessageConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SendMessageConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function sendMessage(string $conversationId, SendMessageConversationsRequest $request = new SendMessageConversationsRequest(), ?array $options = null): ?SendMessageConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$conversationId}/messages",
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
                return SendMessageConversationsResponse::fromJson($json);
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
     * Sets a branded inbox address `{localPart}@inbound.{domain}` on one of your verified sending domains, or clears it when both fields are null. The address starts receiving once the domain's inbound MX record is verified; the default address keeps working. Returns the same body as Get Inbox Address.
     *
     * Example:
     * ```php
     * $client->conversations->updateInboxAddress(
     *     new UpdateInboxAddressRequest([]),
     * );
     * ```
     *
     * @param UpdateInboxAddressRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateInboxAddressResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateInboxAddress(UpdateInboxAddressRequest $request, ?array $options = null): ?UpdateInboxAddressResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/inbox-address",
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
                return UpdateInboxAddressResponse::fromJson($json);
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
     * Opens or closes a conversation.
     *
     * Example:
     * ```php
     * $client->conversations->updateStatus(
     *     'conversationId',
     *     new UpdateStatusConversationsRequest([
     *         'status' => UpdateStatusConversationsRequestStatus::Open->value,
     *     ]),
     * );
     * ```
     *
     * @param string $conversationId Conversation ID.
     * @param UpdateStatusConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateStatusConversationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateStatus(string $conversationId, UpdateStatusConversationsRequest $request, ?array $options = null): ?UpdateStatusConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "conversations/{$conversationId}/status",
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
                return UpdateStatusConversationsResponse::fromJson($json);
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
