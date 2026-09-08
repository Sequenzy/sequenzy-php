<?php

namespace Sequenzy\Subscribers;

use Sequenzy\Subscribers\Events\EventsClient;
use Sequenzy\Subscribers\Tags\TagsClient;
use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Subscribers\Requests\AddTagsBulkRequest;
use Sequenzy\Subscribers\Types\AddTagsBulkResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Types\BulkSubscriberTagRequest;
use Sequenzy\Types\BulkSubscriberTagResponse;
use Sequenzy\Types\SubscriberOperationResponse;
use Sequenzy\Subscribers\Requests\CreateSubscribersRequest;
use Sequenzy\Subscribers\Types\CreateSubscribersResponse;
use Sequenzy\Subscribers\Requests\CreateImportSubscribersRequest;
use Sequenzy\Subscribers\Types\CreateImportSubscribersResponse;
use Sequenzy\Subscribers\Requests\CreateNoteSubscribersRequest;
use Sequenzy\Subscribers\Types\CreateNoteSubscribersResponse;
use Sequenzy\Subscribers\Requests\CreateNoteByExternalIdSubscribersRequest;
use Sequenzy\Subscribers\Types\CreateNoteByExternalIdSubscribersResponse;
use Sequenzy\Subscribers\Types\DeleteSubscribersResponse;
use Sequenzy\Subscribers\Requests\DeleteByExternalIdSubscribersRequest;
use Sequenzy\Subscribers\Types\DeleteByExternalIdSubscribersResponse;
use Sequenzy\Subscribers\Types\DeleteByExternalIdPathSubscribersResponse;
use Sequenzy\Subscribers\Types\DeleteNoteSubscribersResponse;
use Sequenzy\Subscribers\Requests\GetSubscribersRequest;
use Sequenzy\Subscribers\Types\GetSubscribersResponse;
use Sequenzy\Subscribers\Types\GetAccountInfoResponse;
use Sequenzy\Subscribers\Requests\GetByExternalIdSubscribersRequest;
use Sequenzy\Subscribers\Types\GetByExternalIdSubscribersResponse;
use Sequenzy\Subscribers\Requests\GetByExternalIdPathSubscribersRequest;
use Sequenzy\Subscribers\Types\GetByExternalIdPathSubscribersResponse;
use Sequenzy\Subscribers\Types\GetImportSubscribersResponse;
use Sequenzy\Subscribers\Requests\ImportEventsSubscribersRequest;
use Sequenzy\Subscribers\Types\ImportEventsSubscribersResponse;
use Sequenzy\Subscribers\Requests\ListSubscribersRequest;
use Sequenzy\Subscribers\Types\ListSubscribersResponse;
use Sequenzy\Subscribers\Types\ListNotesSubscribersResponse;
use Sequenzy\Subscribers\Requests\ListNotesByExternalIdSubscribersRequest;
use Sequenzy\Subscribers\Types\ListNotesByExternalIdSubscribersResponse;
use Sequenzy\Subscribers\Types\ListOperationsSubscribersResponse;
use Sequenzy\Subscribers\Requests\SubscriberOperationStart;
use Sequenzy\Subscribers\Requests\UpdateSubscribersRequest;
use Sequenzy\Subscribers\Types\UpdateSubscribersResponse;
use Sequenzy\Subscribers\Requests\UpdateByExternalIdSubscribersRequest;
use Sequenzy\Subscribers\Types\UpdateByExternalIdSubscribersResponse;
use Sequenzy\Subscribers\Requests\UpdateByExternalIdPathSubscribersRequest;
use Sequenzy\Subscribers\Types\UpdateByExternalIdPathSubscribersResponse;

class SubscribersClient
{
    /**
     * @var EventsClient $events
     */
    public EventsClient $events;

    /**
     * @var TagsClient $tags
     */
    public TagsClient $tags;

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
        $this->events = new EventsClient($this->client, $this->options);
        $this->tags = new TagsClient($this->client, $this->options);
    }

    /**
     * Adds multiple tags to a subscriber. Creates the subscriber if they don't exist. Creates tag definitions if they don't exist. When the workspace has double opt-in enabled, a brand-new subscriber is created pending confirmation, the confirmation email is queued, and tag automations wait at their trigger until the subscriber confirms.
     *
     * Example:
     * ```php
     * $client->subscribers->addTagsBulk(
     *     new AddTagsBulkRequest([
     *         'tags' => [
     *             'premium',
     *             'newsletter',
     *             'vip',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param AddTagsBulkRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AddTagsBulkResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function addTagsBulk(AddTagsBulkRequest $request, ?array $options = null): ?AddTagsBulkResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/tags/bulk",
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
                return AddTagsBulkResponse::fromJson($json);
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
     * Adds one or more tags to up to 500 existing subscribers identified by email, externalId, or subscriberId. Built for reconciling historical or derived tags, so identifiers that do not match an existing subscriber are returned in notFound rather than creating contacts. Tag automations are skipped unless triggerAutomations is true, which requires the automations:trigger scope.
     *
     * Example:
     * ```php
     * $client->subscribers->bulkAddTags(
     *     new BulkSubscriberTagRequest([
     *         'emails' => [
     *             'one@example.com',
     *             'two@example.com',
     *         ],
     *         'tags' => [
     *             'derived-churn-risk',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param BulkSubscriberTagRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BulkSubscriberTagResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function bulkAddTags(BulkSubscriberTagRequest $request, ?array $options = null): ?BulkSubscriberTagResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/bulk/tags/add",
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
                return BulkSubscriberTagResponse::fromJson($json);
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
     * Removes one or more tags from up to 500 existing subscribers identified by email, externalId, or subscriberId. Identifiers that do not match an existing subscriber are returned in notFound.
     *
     * Example:
     * ```php
     * $client->subscribers->bulkRemoveTags(
     *     new BulkSubscriberTagRequest([
     *         'subscriberIds' => [
     *             'sub_abc123',
     *             'sub_def456',
     *         ],
     *         'tags' => [
     *             'derived-churn-risk',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param BulkSubscriberTagRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BulkSubscriberTagResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function bulkRemoveTags(BulkSubscriberTagRequest $request, ?array $options = null): ?BulkSubscriberTagResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/bulk/tags/remove",
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
                return BulkSubscriberTagResponse::fromJson($json);
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
     * Requires subscribers:read. Tagging and cancelling a tagging task also require subscribers:tag; creating tag definitions requires tags:write; triggering automations requires automations:trigger. Personal keys retain current company role restrictions. Company keys retain company-scoped authority. Workers recheck authority on every page. Cancellation stops future pages and keeps applied tags. An action already in flight may finish; its contact is reported as uncertain. Terminal cancellation is idempotent.
     *
     * Example:
     * ```php
     * $client->subscribers->cancelOperation(
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
     * @return ?SubscriberOperationResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function cancelOperation(string $id, ?array $options = null): ?SubscriberOperationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/operations/{$id}/cancel",
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
                return SubscriberOperationResponse::fromJson($json);
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
     * Creates a new subscriber or handles existing ones based on the `duplicateStrategy` parameter.
     *
     * Requires `subscribers:write`, including when supplying a nonempty `lists` array. Explicit sequence enrollment and writes that can send a double opt-in confirmation require `automations:trigger`.
     *
     * **Duplicate Strategies:**
     * - `skip` (default): Don't update existing subscribers
     * - `merge`: Only fill in missing fields, never overwrite existing values
     * - `overwrite`: Replace all fields (but never reactivate unsubscribed users)
     *
     * Example:
     * ```php
     * $client->subscribers->create(
     *     new CreateSubscribersRequest([]),
     * );
     * ```
     *
     * @param CreateSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateSubscribersRequest $request = new CreateSubscribersRequest(), ?array $options = null): ?CreateSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers",
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
                return CreateSubscribersResponse::fromJson($json);
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
     * Queues an asynchronous full-record subscriber import of up to 5,000 contacts.
     *
     * Example:
     * ```php
     * $client->subscribers->createImport(
     *     new CreateImportSubscribersRequest([
     *         'subscribers' => [
     *             new SubscriberImportRecord([]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param CreateImportSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateImportSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createImport(CreateImportSubscribersRequest $request, ?array $options = null): ?CreateImportSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/imports",
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
                return CreateImportSubscribersResponse::fromJson($json);
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
     * Creates an internal note for a subscriber identified by email address.
     *
     * Example:
     * ```php
     * $client->subscribers->createNote(
     *     'email',
     *     new CreateNoteSubscribersRequest([
     *         'body' => 'body',
     *     ]),
     * );
     * ```
     *
     * @param string $email URL-encoded email address
     * @param CreateNoteSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateNoteSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createNote(string $email, CreateNoteSubscribersRequest $request, ?array $options = null): ?CreateNoteSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/{$email}/notes",
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
                return CreateNoteSubscribersResponse::fromJson($json);
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
     * Creates an internal note for a subscriber identified by customer-owned external ID.
     *
     * Example:
     * ```php
     * $client->subscribers->createNoteByExternalId(
     *     new CreateNoteByExternalIdSubscribersRequest([
     *         'externalId' => 'externalId',
     *         'body' => 'body',
     *     ]),
     * );
     * ```
     *
     * @param CreateNoteByExternalIdSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateNoteByExternalIdSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createNoteByExternalId(CreateNoteByExternalIdSubscribersRequest $request, ?array $options = null): ?CreateNoteByExternalIdSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['externalId'] = $request->externalId;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external/notes",
                    method: HttpMethod::POST,
                    query: $query,
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
                return CreateNoteByExternalIdSubscribersResponse::fromJson($json);
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
     * Deletes a subscriber by their email address.
     *
     * Example:
     * ```php
     * $client->subscribers->delete(
     *     'email',
     * );
     * ```
     *
     * @param string $email URL-encoded email address
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $email, ?array $options = null): ?DeleteSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/{$email}",
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
                return DeleteSubscribersResponse::fromJson($json);
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
     * Deletes a subscriber by their customer-owned external ID.
     *
     * Example:
     * ```php
     * $client->subscribers->deleteByExternalId(
     *     new DeleteByExternalIdSubscribersRequest([
     *         'externalId' => 'externalId',
     *     ]),
     * );
     * ```
     *
     * @param DeleteByExternalIdSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteByExternalIdSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteByExternalId(DeleteByExternalIdSubscribersRequest $request, ?array $options = null): ?DeleteByExternalIdSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['externalId'] = $request->externalId;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external",
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
                return DeleteByExternalIdSubscribersResponse::fromJson($json);
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
     * Compatibility route for external IDs that do not contain path separators. Use `/subscribers/external?externalId=...` for IDs containing slashes.
     *
     * Example:
     * ```php
     * $client->subscribers->deleteByExternalIdPath(
     *     'externalId',
     * );
     * ```
     *
     * @param string $externalId URL-encoded external ID without path separators
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteByExternalIdPathSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteByExternalIdPath(string $externalId, ?array $options = null): ?DeleteByExternalIdPathSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external/{$externalId}",
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
                return DeleteByExternalIdPathSubscribersResponse::fromJson($json);
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
     * Deletes one internal subscriber note by note ID.
     *
     * Example:
     * ```php
     * $client->subscribers->deleteNote(
     *     'noteId',
     * );
     * ```
     *
     * @param string $noteId Subscriber note ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteNoteSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteNote(string $noteId, ?array $options = null): ?DeleteNoteSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/notes/{$noteId}",
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
                return DeleteNoteSubscribersResponse::fromJson($json);
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
     * Retrieves a subscriber by their email address, including notes, list memberships, sequence enrollments, email stats, and recent activity.
     *
     * Example:
     * ```php
     * $client->subscribers->get(
     *     'email',
     *     new GetSubscribersRequest([]),
     * );
     * ```
     *
     * @param string $email URL-encoded email address
     * @param GetSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $email, GetSubscribersRequest $request = new GetSubscribersRequest(), ?array $options = null): ?GetSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/{$email}",
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
                return GetSubscribersResponse::fromJson($json);
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
     * Returns account information for the authenticated API key. Useful for connection labels in integrations.
     *
     * Example:
     * ```php
     * $client->subscribers->getAccountInfo();
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
     * @return ?GetAccountInfoResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getAccountInfo(?array $options = null): ?GetAccountInfoResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/me",
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
                return GetAccountInfoResponse::fromJson($json);
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
     * Retrieves a subscriber by their customer-owned external ID, including notes, list memberships, sequence enrollments, email stats, and recent activity.
     *
     * Example:
     * ```php
     * $client->subscribers->getByExternalId(
     *     new GetByExternalIdSubscribersRequest([
     *         'externalId' => 'externalId',
     *     ]),
     * );
     * ```
     *
     * @param GetByExternalIdSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetByExternalIdSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getByExternalId(GetByExternalIdSubscribersRequest $request, ?array $options = null): ?GetByExternalIdSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['externalId'] = $request->externalId;
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external",
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
                return GetByExternalIdSubscribersResponse::fromJson($json);
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
     * Compatibility route for external IDs that do not contain path separators. Use `/subscribers/external?externalId=...` for IDs containing slashes.
     *
     * Example:
     * ```php
     * $client->subscribers->getByExternalIdPath(
     *     'externalId',
     *     new GetByExternalIdPathSubscribersRequest([]),
     * );
     * ```
     *
     * @param string $externalId URL-encoded external ID without path separators
     * @param GetByExternalIdPathSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetByExternalIdPathSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getByExternalIdPath(string $externalId, GetByExternalIdPathSubscribersRequest $request = new GetByExternalIdPathSubscribersRequest(), ?array $options = null): ?GetByExternalIdPathSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external/{$externalId}",
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
                return GetByExternalIdPathSubscribersResponse::fromJson($json);
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
     * Returns progress, counts, and failure summaries by import ID or batch ID. Every excluded row is explained - skippedReasons sums to skippedCount and failedReasons sums to failedCount. Status completed means row processing has finished; custom-attribute sync can still be pending, so attribute-based segment counts may take roughly 30–35 seconds or longer to reflect the updates.
     *
     * Example:
     * ```php
     * $client->subscribers->getImport(
     *     'importId',
     * );
     * ```
     *
     * @param string $importId Import ID or batch ID returned by the create endpoint.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetImportSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getImport(string $importId, ?array $options = null): ?GetImportSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/imports/{$importId}",
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
                return GetImportSubscribersResponse::fromJson($json);
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
     * Requires subscribers:read. Tagging and cancelling a tagging task also require subscribers:tag; creating tag definitions requires tags:write; triggering automations requires automations:trigger. Personal keys retain current company role restrictions. Company keys retain company-scoped authority. Workers recheck authority on every page.
     *
     * Example:
     * ```php
     * $client->subscribers->getOperation(
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
     * @return ?SubscriberOperationResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getOperation(string $id, ?array $options = null): ?SubscriberOperationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/operations/{$id}",
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
                return SubscriberOperationResponse::fromJson($json);
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
     * Records a bounded batch of up to 25 events for many subscribers. Email is required to create a contact; externalId-only rows must resolve to an existing contact. Events are grouped per contact - a contact whose rows are all more than an hour old is imported silently as history, including no double-opt-in email, while any recent row makes that contact's whole group live. Stable eventIds keep one receipt and let retries re-attempt downstream recovery idempotently.
     *
     * Example:
     * ```php
     * $client->subscribers->importEvents(
     *     new ImportEventsSubscribersRequest([
     *         'events' => [
     *             new ImportEventsSubscribersRequestEventsItem([
     *                 'eventId' => 'order_12345',
     *                 'name' => 'purchase_completed',
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param ImportEventsSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ImportEventsSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function importEvents(ImportEventsSubscribersRequest $request, ?array $options = null): ?ImportEventsSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/events/imports",
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
                return ImportEventsSubscribersResponse::fromJson($json);
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
     * Lists subscribers with stable pagination and optional filtering by status, free-text query, tags, list, segment, attribute, or email. Non-attribute results are ordered by createdAt descending with subscriber ID as a deterministic tie-breaker. Attribute-filtered results use ClickHouse-first cursor pagination ordered by subscriber ID ascending and do not include a total count.
     *
     * **Pulling a full audience:** every response includes `pagination.nextCursor` and `pagination.hasMore`. Follow `nextCursor` rather than incrementing `page`. Cursor pagination keeps results stable while subscribers are being created or deleted mid-pull (page numbers can skip or repeat rows as the underlying set shifts) and skips the total-count query, so `pagination.total` and `pagination.totalPages` are `null` on cursor requests. Combined with `limit=1000`, a 10,000-subscriber export takes ten requests instead of a hundred.
     *
     * Example:
     * ```php
     * $client->subscribers->list(
     *     new ListSubscribersRequest([]),
     * );
     * ```
     *
     * @param ListSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListSubscribersRequest $request = new ListSubscribersRequest(), ?array $options = null): ?ListSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->attribute != null) {
            $query['attribute'] = $request->attribute;
        }
        if ($request->attributeOperator != null) {
            $query['attributeOperator'] = $request->attributeOperator;
        }
        if ($request->cursor != null) {
            $query['cursor'] = $request->cursor;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->includeTotal != null) {
            $query['includeTotal'] = $request->includeTotal;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->list != null) {
            $query['list'] = $request->list;
        }
        if ($request->listId != null) {
            $query['listId'] = $request->listId;
        }
        if ($request->listName != null) {
            $query['listName'] = $request->listName;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->query != null) {
            $query['query'] = $request->query;
        }
        if ($request->segmentId != null) {
            $query['segmentId'] = $request->segmentId;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->tags != null) {
            $query['tags'] = $request->tags;
        }
        if ($request->unsubscribedAfter != null) {
            $query['unsubscribedAfter'] = $request->unsubscribedAfter;
        }
        if ($request->unsubscribedBefore != null) {
            $query['unsubscribedBefore'] = $request->unsubscribedBefore;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers",
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
                return ListSubscribersResponse::fromJson($json);
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
     * Lists internal notes for a subscriber identified by email address.
     *
     * Example:
     * ```php
     * $client->subscribers->listNotes(
     *     'email',
     * );
     * ```
     *
     * @param string $email URL-encoded email address
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListNotesSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listNotes(string $email, ?array $options = null): ?ListNotesSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/{$email}/notes",
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
                return ListNotesSubscribersResponse::fromJson($json);
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
     * Lists internal notes for a subscriber identified by customer-owned external ID.
     *
     * Example:
     * ```php
     * $client->subscribers->listNotesByExternalId(
     *     new ListNotesByExternalIdSubscribersRequest([
     *         'externalId' => 'externalId',
     *     ]),
     * );
     * ```
     *
     * @param ListNotesByExternalIdSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListNotesByExternalIdSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listNotesByExternalId(ListNotesByExternalIdSubscribersRequest $request, ?array $options = null): ?ListNotesByExternalIdSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['externalId'] = $request->externalId;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external/notes",
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
                return ListNotesByExternalIdSubscribersResponse::fromJson($json);
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
     * Returns up to twenty recent retained operations for the company. Requires subscribers:read. Tagging and cancelling a tagging task also require subscribers:tag; creating tag definitions requires tags:write; triggering automations requires automations:trigger. Personal keys retain current company role restrictions. Company keys retain company-scoped authority. Workers recheck authority on every page.
     *
     * Example:
     * ```php
     * $client->subscribers->listOperations();
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
     * @return ?ListOperationsSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listOperations(?array $options = null): ?ListOperationsSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/operations",
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
                return ListOperationsSubscribersResponse::fromJson($json);
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
     * Requires subscribers:read. Tagging and cancelling a tagging task also require subscribers:tag; creating tag definitions requires tags:write; triggering automations requires automations:trigger. Personal keys retain current company role restrictions. Company keys retain company-scoped authority. Workers recheck authority on every page. Returns immediately with a durable ID. Retry the same requestKey after an uncertain response. Active tasks have a seven-day processing deadline. Completed/failed/cancelled records are retained seven days. Inspect failures before retrying interrupted tagging; an uncertain action is never automatically replayed.
     *
     * Example:
     * ```php
     * $client->subscribers->startOperation(
     *     new SubscriberOperationStart([
     *         'kind' => SubscriberOperationStartKind::AddTags->value,
     *         'requestKey' => 'requestKey',
     *         'tags' => [
     *             'tags',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param SubscriberOperationStart $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberOperationResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function startOperation(SubscriberOperationStart $request, ?array $options = null): ?SubscriberOperationResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/operations",
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
                return SubscriberOperationResponse::fromJson($json);
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
     * Updates a subscriber's first name, last name, status, tags, or custom attributes. Setting `status` to `unsubscribed` performs the full unsubscribe workflow, including list unsubscription and sequence cancellation.
     *
     * Example:
     * ```php
     * $client->subscribers->update(
     *     'email',
     *     new UpdateSubscribersRequest([]),
     * );
     * ```
     *
     * @param string $emailPathParam URL-encoded email address
     * @param UpdateSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $emailPathParam, UpdateSubscribersRequest $request = new UpdateSubscribersRequest(), ?array $options = null): ?UpdateSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/{$emailPathParam}",
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
                return UpdateSubscribersResponse::fromJson($json);
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
     * Updates a subscriber's email, external ID, first name, last name, status, tags, or custom attributes.
     *
     * Example:
     * ```php
     * $client->subscribers->updateByExternalId(
     *     new UpdateByExternalIdSubscribersRequest([
     *         'externalId' => 'externalId',
     *     ]),
     * );
     * ```
     *
     * @param UpdateByExternalIdSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateByExternalIdSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateByExternalId(UpdateByExternalIdSubscribersRequest $request, ?array $options = null): ?UpdateByExternalIdSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['externalId'] = $request->externalId;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external",
                    method: HttpMethod::PATCH,
                    query: $query,
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
                return UpdateByExternalIdSubscribersResponse::fromJson($json);
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
     * Compatibility route for external IDs that do not contain path separators. Use `/subscribers/external?externalId=...` for IDs containing slashes.
     *
     * Example:
     * ```php
     * $client->subscribers->updateByExternalIdPath(
     *     'externalId',
     *     new UpdateByExternalIdPathSubscribersRequest([]),
     * );
     * ```
     *
     * @param string $externalIdPathParam URL-encoded external ID without path separators
     * @param UpdateByExternalIdPathSubscribersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateByExternalIdPathSubscribersResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateByExternalIdPath(string $externalIdPathParam, UpdateByExternalIdPathSubscribersRequest $request = new UpdateByExternalIdPathSubscribersRequest(), ?array $options = null): ?UpdateByExternalIdPathSubscribersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "subscribers/external/{$externalIdPathParam}",
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
                return UpdateByExternalIdPathSubscribersResponse::fromJson($json);
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
