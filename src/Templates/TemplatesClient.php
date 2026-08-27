<?php

namespace Sequenzy\Templates;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Templates\Requests\CreateTemplatesRequest;
use Sequenzy\Templates\Types\CreateTemplatesResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Templates\Types\CreateShareLinkTemplatesResponse;
use Sequenzy\Templates\Types\DeleteTemplatesResponse;
use Sequenzy\Templates\Types\GetTemplatesResponse;
use Sequenzy\Templates\Requests\ListTemplatesRequest;
use Sequenzy\Templates\Types\ListTemplatesResponse;
use Sequenzy\Templates\Requests\RenderTemplatesRequest;
use Sequenzy\Types\RenderEmailResponse;
use Sequenzy\Templates\Types\RevokeShareLinkTemplatesResponse;
use Sequenzy\Templates\Requests\SetLocalizationTemplatesRequest;
use Sequenzy\Templates\Types\SetLocalizationTemplatesResponse;
use Sequenzy\Templates\Requests\SyncLocalizationsTemplatesRequest;
use Sequenzy\Templates\Types\SyncLocalizationsTemplatesResponse;
use Sequenzy\Templates\Requests\UpdateTemplatesRequest;
use Sequenzy\Templates\Types\UpdateTemplatesResponse;

class TemplatesClient
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
     * Creates a reusable email template from exactly one of prompt, HTML, or Sequenzy blocks.
     *
     * Example:
     * ```php
     * $client->templates->create(
     *     new CreateTemplatesRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param CreateTemplatesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateTemplatesRequest $request, ?array $options = null): ?CreateTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates",
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
                return CreateTemplatesResponse::fromJson($json);
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
     * Creates (or fetches) the public view-in-browser link for an individual email - a transactional email, a sequence email, or a standalone template. Accepts a template ID or a transactional email's ID or slug; for a sequence email, pass the step's emailId. The hosted page renders an anonymized copy - sample contact, inert unsubscribe link, no open/click tracking - so the URL is safe to forward to anyone. Idempotent - an already-active link is returned with created=false instead of being rotated. Campaigns use their own campaign-level share link, which follows the A/B winning variant.
     *
     * Example:
     * ```php
     * $client->templates->createShareLink(
     *     'templateId',
     * );
     * ```
     *
     * @param string $templateId Template ID, transactional email ID, or transactional slug.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateShareLinkTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createShareLink(string $templateId, ?array $options = null): ?CreateShareLinkTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}/share-link",
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
                return CreateShareLinkTemplatesResponse::fromJson($json);
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
     * Deletes an unused email template. Templates used by campaigns, sequences, or transactional emails cannot be deleted.
     *
     * Example:
     * ```php
     * $client->templates->delete(
     *     'templateId',
     * );
     * ```
     *
     * @param string $templateId Template ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $templateId, ?array $options = null): ?DeleteTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}",
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
                return DeleteTemplatesResponse::fromJson($json);
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
     * Returns one email template. Transactional email IDs and slugs are also resolved for compatibility, as is the `emailId` returned by campaign endpoints, so this can read the blocks of an email designed in the dashboard.
     *
     * Example:
     * ```php
     * $client->templates->get(
     *     'templateId',
     * );
     * ```
     *
     * @param string $templateId Template ID, transactional email ID, or transactional slug.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $templateId, ?array $options = null): ?GetTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}",
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
                return GetTemplatesResponse::fromJson($json);
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
     * Lists saved email templates for the authenticated company, optionally filtered by label. Templates are the company's saved email bodies: standalone templates plus the bodies behind campaigns and transactional emails, so dashboard-designed emails appear here too. A campaign's `emailId` points at its entry in this list, and any template ID can be passed as `templateId` when creating a campaign. Bodies are kept when their campaign or transactional email is deleted. Results are newest first and paginated: 50 per page by default, up to 100. Page with `offset` while `pagination.hasMore` is true.
     *
     * Example:
     * ```php
     * $client->templates->list(
     *     new ListTemplatesRequest([]),
     * );
     * ```
     *
     * @param ListTemplatesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListTemplatesRequest $request = new ListTemplatesRequest(), ?array $options = null): ?ListTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->label != null) {
            $query['label'] = $request->label;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates",
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
                return ListTemplatesResponse::fromJson($json);
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
     * Render a template to the exact email-safe HTML that would be sent, for embedding a visual preview. Read-only: this never sends or modifies anything, and uses POST only so personalization input can travel in a request body.
     *
     * Example:
     * ```php
     * $client->templates->render(
     *     'templateId',
     *     new RenderTemplatesRequest([
     *         'body' => new RenderEmailRequest([]),
     *     ]),
     * );
     * ```
     *
     * @param string $templateId Template ID, transactional email ID, or transactional slug.
     * @param RenderTemplatesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RenderEmailResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function render(string $templateId, RenderTemplatesRequest $request, ?array $options = null): ?RenderEmailResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}/render",
                    method: HttpMethod::POST,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return RenderEmailResponse::fromJson($json);
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
     * Revokes the email's public view-in-browser link. The shared URL returns 404 immediately; sharing again later mints a different URL. Returns revoked=false when no link was active.
     *
     * Example:
     * ```php
     * $client->templates->revokeShareLink(
     *     'templateId',
     * );
     * ```
     *
     * @param string $templateId Template ID, transactional email ID, or transactional slug.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RevokeShareLinkTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function revokeShareLink(string $templateId, ?array $options = null): ?RevokeShareLinkTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}/share-link",
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
                return RevokeShareLinkTemplatesResponse::fromJson($json);
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
     * Creates or replaces a caller-supplied localized template variant. The locale must be enabled for the company and cannot be its primary locale.
     *
     * Example:
     * ```php
     * $client->templates->setLocalization(
     *     'templateId',
     *     'locale',
     *     new SetLocalizationTemplatesRequest([
     *         'subject' => 'subject',
     *     ]),
     * );
     * ```
     *
     * @param string $templateId Template ID, transactional email ID, or transactional slug.
     * @param string $locale Enabled non-primary locale code such as es or pt-BR.
     * @param SetLocalizationTemplatesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SetLocalizationTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function setLocalization(string $templateId, string $locale, SetLocalizationTemplatesRequest $request, ?array $options = null): ?SetLocalizationTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}/localizations/{$locale}",
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
                return SetLocalizationTemplatesResponse::fromJson($json);
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
     * Queues AI translation for selected enabled template locales. Omit locales to sync every enabled non-primary locale, even when automatic on-save sync is disabled.
     *
     * Example:
     * ```php
     * $client->templates->syncLocalizations(
     *     'templateId',
     *     new SyncLocalizationsTemplatesRequest([]),
     * );
     * ```
     *
     * @param string $templateId Template ID, transactional email ID, or transactional slug.
     * @param SyncLocalizationsTemplatesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SyncLocalizationsTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function syncLocalizations(string $templateId, SyncLocalizationsTemplatesRequest $request = new SyncLocalizationsTemplatesRequest(), ?array $options = null): ?SyncLocalizationsTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}/localizations/sync",
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
                return SyncLocalizationsTemplatesResponse::fromJson($json);
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
     * Updates template metadata, labels, or content. Transactional email IDs and slugs are also resolved for compatibility.
     *
     * Example:
     * ```php
     * $client->templates->update(
     *     'templateId',
     *     new UpdateTemplatesRequest([]),
     * );
     * ```
     *
     * @param string $templateId Template ID, transactional email ID, or transactional slug.
     * @param UpdateTemplatesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateTemplatesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $templateId, UpdateTemplatesRequest $request = new UpdateTemplatesRequest(), ?array $options = null): ?UpdateTemplatesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "templates/{$templateId}",
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
                return UpdateTemplatesResponse::fromJson($json);
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
