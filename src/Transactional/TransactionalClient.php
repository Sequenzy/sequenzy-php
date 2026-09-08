<?php

namespace Sequenzy\Transactional;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Transactional\Requests\CreateTransactionalRequest;
use Sequenzy\Transactional\Types\CreateTransactionalResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Transactional\Types\DeleteTransactionalResponse;
use Sequenzy\Transactional\Types\GetTransactionalResponse;
use Sequenzy\Transactional\Requests\ListTransactionalRequest;
use Sequenzy\Transactional\Types\ListTransactionalResponse;
use Sequenzy\Transactional\Requests\SendTransactionalRequest;
use Sequenzy\Transactional\Types\SendTransactionalResponseTransactional;
use Sequenzy\Transactional\Types\SendTransactionalResponseOne;
use Sequenzy\Core\Json\JsonDecoder;
use Sequenzy\Core\Types\Union;
use Sequenzy\Transactional\Requests\UpdateTransactionalRequest;
use Sequenzy\Transactional\Types\UpdateTransactionalResponse;

class TransactionalClient
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
     * Creates a saved transactional email template from exactly one of prompt, HTML, or Sequenzy blocks. Prompt-created templates default to disabled.
     *
     * Example:
     * ```php
     * $client->transactional->create(
     *     new CreateTransactionalRequest([
     *         'name' => 'Password Reset',
     *     ]),
     * );
     * ```
     *
     * @param CreateTransactionalRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateTransactionalResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateTransactionalRequest $request, ?array $options = null): ?CreateTransactionalResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "transactional",
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
                return CreateTransactionalResponse::fromJson($json);
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
     * Permanently deletes a saved transactional email template by ID or slug, so its slug stops sending and becomes free to reuse.
     *
     * Already-sent deliveries are untouched: send history, stats, and stored HTML live on the deliveries themselves.
     *
     * The email content is kept as a reusable template and returned as `deleted.emailId`; pass that to `DELETE /api/v1/templates/{templateId}` to remove the content too. To stop sends without losing the template, update it with `enabled: false` instead.
     *
     * Requires an API key with the `transactional:delete` scope.
     *
     * Example:
     * ```php
     * $client->transactional->delete(
     *     'welcome-email',
     * );
     * ```
     *
     * @param string $idOrSlug Transactional email ID or slug
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteTransactionalResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $idOrSlug, ?array $options = null): ?DeleteTransactionalResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "transactional/{$idOrSlug}",
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
                return DeleteTransactionalResponse::fromJson($json);
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
     * Gets details of a transactional email template by ID or slug, including linked body content and available template variables.
     *
     * Example:
     * ```php
     * $client->transactional->get(
     *     'welcome-email',
     * );
     * ```
     *
     * @param string $idOrSlug Transactional email ID or slug
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetTransactionalResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $idOrSlug, ?array $options = null): ?GetTransactionalResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "transactional/{$idOrSlug}",
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
                return GetTransactionalResponse::fromJson($json);
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
     * Lists transactional email templates with their linked subjects and all-time delivery metrics. Search name, slug, or subject; filter active state; and sort by engagement. Human engagement is used by default.
     *
     * Example:
     * ```php
     * $client->transactional->list(
     *     new ListTransactionalRequest([]),
     * );
     * ```
     *
     * @param ListTransactionalRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListTransactionalResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListTransactionalRequest $request = new ListTransactionalRequest(), ?array $options = null): ?ListTransactionalResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->includeMachineEngagement != null) {
            $query['includeMachineEngagement'] = $request->includeMachineEngagement;
        }
        if ($request->order != null) {
            $query['order'] = $request->order;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->sort != null) {
            $query['sort'] = $request->sort;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "transactional",
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
                return ListTransactionalResponse::fromJson($json);
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
     * Queues an email for sending. The default `emailType` is `transactional`. Set it to `marketing` for a consented single-recipient lifecycle or promotional message. Marketing mode creates or links a minimal subscriber, honors unsubscribe suppression, adds the standard marketing footer, and emits RFC 8058 one-click-unsubscribe headers. The caller remains responsible for having consent or another lawful basis.
     *
     * For callers that may retry, send a stable `Idempotency-Key` header. The same key and request returns the original `emailSendId` for 14 days without another delivery. Reusing a key with different request content returns 409.
     *
     * Repeated identical transactional content reaching many distinct recipients can trigger a junk/list-testing review. Sending continues while review is pending or unavailable. A substantiated verdict can reject later matching deliveries before sending; these become terminal `failed` sends with an `errorMessage` beginning `Transactional content rejected:`. Read GET /email-sends/{emailSendId} for the final outcome. Failed deliveries are not held or replayed automatically, and replaying the same Idempotency-Key returns the original acceptance response. Dashboard retries of rejected deliveries also fail without sending, even after the decision expires. Correct the content or contact support before deliberately submitting a new logical send. This check does not pause the company or ban the account.
     *
     * You can either:
     * - Provide a canonical `slug` (or compatibility alias `templateId`) to use a saved template
     * - Provide `subject` and canonical `body` (or compatibility alias `html`) to send custom content directly
     *
     * If both a canonical field and its alias are provided, `slug` must match `templateId` and `body` must match `html`.
     *
     * **Recipients:**
     * - `to` can be a single email or an array of up to 50 emails
     * - Duplicate emails are automatically deduplicated
     * - Marketing mode requires exactly one `to` recipient and does not support `cc` or `bcc`
     *
     * **Attachments:**
     * - Attachments can be provided as Base64-encoded content or URLs
     * - Maximum 10 attachments and 7MB total per email
     * - Any file type supported (PDFs, images, documents, etc.)
     * - Set `contentId` on an attachment to embed it as an inline image referenced from the HTML as `<img src="cid:VALUE">`
     *
     * A successful response means the email was accepted for background processing. Transactional emails are not blocked by subscriber unsubscribe or double opt-in status. If a recipient is suppressed because of a hard bounce or spam complaint, the worker records the send as `suppressed` instead of delivering it.
     *
     * Optionally set `from` (domain must be verified) and `replyTo` addresses. When reply tracking is enabled, Sequenzy uses a unique trackable `Reply-To` header and treats the resolved reply destination as the forwarding destination for captured replies.
     * Without a reply identity override, saved-template sends prefer the template reply profile. Otherwise sends prefer the effective sending domain's default reply profile, then the company default, then the first company reply profile. The resolved destination is retained whether or not reply tracking is enabled; it is sent as the Reply-To header only when reply tracking is disabled.
     * Variables can be passed to customize the email content. Nested objects and arrays are supported for repeat blocks, such as `items`. `{{viewInBrowserUrl}}` is generated automatically for a hosted copy link. For a single recipient, Sequenzy matches an existing subscriber by `subscriberExternalId` or email and backfills stored first and last names when the corresponding request variables are omitted; explicit variables take precedence. Returns immediately with a durable `emailSendId` and the accepted `emailType`. If Sequenzy detects likely missing or unused variables before queueing, the successful response includes a non-blocking `diagnostics` warning object. Missing values do not block queueing or sending; a required variable that is not provided and has no default renders as an empty string.
     *
     * Select existing identities with senderProfileId or fromEmail (and optional fromName), and replyProfileId or replyTo (with optional replyToName). These inputs look up profiles rather than create them. Use emailType, not isMarketing, to choose delivery policy.
     *
     * Example:
     * ```php
     * $client->transactional->send(
     *     new SendTransactionalRequest([
     *         'slug' => 'welcome-email',
     *         'to' => 'recipient@example.com',
     *         'variables' => [
     *             'NAME' => "John",
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param SendTransactionalRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return (
     *    SendTransactionalResponseTransactional
     *   |SendTransactionalResponseOne
     * )|null
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function send(SendTransactionalRequest $request, ?array $options = null): SendTransactionalResponseTransactional|SendTransactionalResponseOne|null
    {
        $options = array_merge($this->options, $options ?? []);
        $headers = [];
        if ($request->idempotencyKey != null) {
            $headers['Idempotency-Key'] = $request->idempotencyKey;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "transactional/send",
                    method: HttpMethod::POST,
                    headers: $headers,
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
                return JsonDecoder::decodeUnion($json, new Union(SendTransactionalResponseTransactional::class, SendTransactionalResponseOne::class)); // @phpstan-ignore-line
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
     * Updates transactional email metadata or replaces the linked email body using raw HTML or Sequenzy blocks.
     *
     * Example:
     * ```php
     * $client->transactional->update(
     *     'welcome-email',
     *     new UpdateTransactionalRequest([]),
     * );
     * ```
     *
     * @param string $idOrSlug Transactional email ID or slug
     * @param UpdateTransactionalRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateTransactionalResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $idOrSlug, UpdateTransactionalRequest $request = new UpdateTransactionalRequest(), ?array $options = null): ?UpdateTransactionalResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "transactional/{$idOrSlug}",
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
                return UpdateTransactionalResponse::fromJson($json);
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
