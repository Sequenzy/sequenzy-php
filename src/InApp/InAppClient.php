<?php

namespace Sequenzy\InApp;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\InApp\Types\DeleteInAppMessageResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\InApp\Types\GetInAppStepStatsResponse;
use Sequenzy\InApp\Requests\ListInAppMessagesRequest;
use Sequenzy\InApp\Types\ListInAppMessagesResponse;
use Sequenzy\InApp\Types\ListInAppTemplatesResponse;
use Sequenzy\InApp\Requests\RecordInAppEventRequest;
use Sequenzy\InApp\Types\RecordInAppEventResponse;
use Sequenzy\InApp\Requests\WriteInAppCopyRequest;
use Sequenzy\InApp\Types\WriteInAppCopyResponse;

class InAppClient
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
     * Deletes an item so the contact's app stops showing it the next time it fetches the feed. Its engagement no longer counts in step stats. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->deleteInAppMessage(
     *     'messageId',
     * );
     * ```
     *
     * @param string $messageId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteInAppMessageResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteInAppMessage(string $messageId, ?array $options = null): ?DeleteInAppMessageResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/messages/{$messageId}",
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
                return DeleteInAppMessageResponse::fromJson($json);
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
     * Created, displayed, clicked and dismissed counts for one in_app sequence step. Requires the sequences:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->getInAppStepStats(
     *     'stepId',
     * );
     * ```
     *
     * @param string $stepId The step's node ID from Get Sequence.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetInAppStepStatsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getInAppStepStats(string $stepId, ?array $options = null): ?GetInAppStepStatsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/steps/{$stepId}/stats",
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
                return GetInAppStepStatsResponse::fromJson($json);
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
     * Lists a contact's in-app messages and content cards, created by in_app sequence steps. With status open (default) it returns what the app should show now: messages not yet displayed, clicked or dismissed, and cards not dismissed, excluding expired items, messages first, then pinned cards, then newest. With status all it returns history, newest first. Identify the contact with email, externalId or subscriberId. Requires the subscribers:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->listInAppMessages(
     *     new ListInAppMessagesRequest([]),
     * );
     * ```
     *
     * @param ListInAppMessagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListInAppMessagesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listInAppMessages(ListInAppMessagesRequest $request = new ListInAppMessagesRequest(), ?array $options = null): ?ListInAppMessagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->externalId != null) {
            $query['externalId'] = $request->externalId;
        }
        if ($request->kind != null) {
            $query['kind'] = $request->kind;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->subscriberId != null) {
            $query['subscriberId'] = $request->subscriberId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/messages",
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
                return ListInAppMessagesResponse::fromJson($json);
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
     * Built-in starting points for in_app sequence steps. Each config is a complete step without a label; link buttons have no url until you add one. Requires the sequences:read scope.
     *
     * Example:
     * ```php
     * $client->inApp->listInAppTemplates();
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
     * @return ?ListInAppTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listInAppTemplates(?array $options = null): ?ListInAppTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/templates",
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
                return ListInAppTemplatesResponse::fromJson($json);
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
     * Records that the app displayed, clicked, dismissed or read an item. The first report of each type sets its timestamp; repeats change nothing except clickCount, and recorded is false. Clicks, dismissals and reads also mark the item displayed. Messages leave the open feed once displayed, clicked or dismissed; cards once dismissed. Requires the subscribers:write scope.
     *
     * Example:
     * ```php
     * $client->inApp->recordInAppEvent(
     *     'messageId',
     *     new RecordInAppEventRequest([
     *         'type' => RecordInAppEventRequestType::Displayed->value,
     *     ]),
     * );
     * ```
     *
     * @param string $messageId
     * @param RecordInAppEventRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RecordInAppEventResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function recordInAppEvent(string $messageId, RecordInAppEventRequest $request, ?array $options = null): ?RecordInAppEventResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/messages/{$messageId}/events",
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
                return RecordInAppEventResponse::fromJson($json);
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
     * Writes an in-app message's eyebrow, title, message and button labels with AI from a brief. Nothing is saved. Requires the sequences:write scope; limited to 20 requests a minute per workspace.
     *
     * Example:
     * ```php
     * $client->inApp->writeInAppCopy(
     *     new WriteInAppCopyRequest([
     *         'brief' => 'brief',
     *     ]),
     * );
     * ```
     *
     * @param WriteInAppCopyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?WriteInAppCopyResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function writeInAppCopy(WriteInAppCopyRequest $request, ?array $options = null): ?WriteInAppCopyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "in-app/copy",
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
                return WriteInAppCopyResponse::fromJson($json);
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
