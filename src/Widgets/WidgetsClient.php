<?php

namespace Sequenzy\Widgets;

use Sequenzy\Widgets\Preferences\PreferencesClient;
use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Widgets\Requests\CreateSavedFormRequest;
use Sequenzy\Widgets\Types\CreateSavedFormResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Widgets\Requests\CreateSavedPopupRequest;
use Sequenzy\Widgets\Types\CreateSavedPopupResponse;
use Sequenzy\Widgets\Types\DeleteSavedPopupResponse;
use Sequenzy\Widgets\Requests\DuplicateSavedPopupRequest;
use Sequenzy\Widgets\Types\DuplicateSavedPopupResponse;
use Sequenzy\Widgets\Types\GetSavedFormEmbedResponse;
use Sequenzy\Widgets\Types\GetSavedPopupResponse;
use Sequenzy\Widgets\Types\GetSavedPopupEmbedResponse;
use Sequenzy\Widgets\Types\ListSavedFormsResponse;
use Sequenzy\Widgets\Requests\ListSavedPopupsRequest;
use Sequenzy\Widgets\Types\ListSavedPopupsResponse;
use Sequenzy\Widgets\Requests\SubmitCompanyScopedSavedSignupFormRequest;
use Sequenzy\Widgets\Types\SubmitCompanyScopedSavedSignupFormResponse;
use Sequenzy\Widgets\Requests\SubmitSavedPopupRequest;
use Sequenzy\Widgets\Types\SubmitSavedPopupResponse;
use Sequenzy\Widgets\Requests\SubmitSignupFormRequest;
use Sequenzy\Widgets\Types\SubmitSignupFormResponse;
use Sequenzy\Widgets\Requests\UpdateSavedFormRequest;
use Sequenzy\Widgets\Types\UpdateSavedFormResponse;
use Sequenzy\Widgets\Requests\UpdateSavedPopupRequest;
use Sequenzy\Widgets\Types\UpdateSavedPopupResponse;

class WidgetsClient
{
    /**
     * @var PreferencesClient $preferences
     */
    public PreferencesClient $preferences;

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
        $this->preferences = new PreferencesClient($this->client, $this->options);
    }

    /**
     * Creates and publishes a saved signup form. Its opaque form ID becomes a client-safe public capability while audience and success settings remain server-side.
     *
     * Example:
     * ```php
     * $client->widgets->createSavedForm(
     *     new CreateSavedFormRequest([
     *         'listIds' => [
     *             'listIds',
     *         ],
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param CreateSavedFormRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateSavedFormResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createSavedForm(CreateSavedFormRequest $request, ?array $options = null): ?CreateSavedFormResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms",
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
                return CreateSavedFormResponse::fromJson($json);
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
     * Creates a saved on-site signup popup and returns the one-line script tag that deploys it. The popup is published by default, so the script is live as soon as it is added to the site. Trigger, targeting, audience, and duplicate handling stay server-side, so the deployed script carries no API key.
     *
     * Omit `listIds` to capture into every list, matching the dashboard default.
     *
     * Example:
     * ```php
     * $client->widgets->createSavedPopup(
     *     new CreateSavedPopupRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param CreateSavedPopupRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateSavedPopupResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createSavedPopup(CreateSavedPopupRequest $request, ?array $options = null): ?CreateSavedPopupResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "popups",
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
                return CreateSavedPopupResponse::fromJson($json);
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
     * Permanently deletes a saved popup along with its view and conversion counts. Subscribers it already captured are not affected. To stop a popup from showing while keeping its stats, set its status to draft instead.
     *
     * Example:
     * ```php
     * $client->widgets->deleteSavedPopup(
     *     'popupId',
     * );
     * ```
     *
     * @param string $popupId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteSavedPopupResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteSavedPopup(string $popupId, ?array $options = null): ?DeleteSavedPopupResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "popups/{$popupId}",
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
                return DeleteSavedPopupResponse::fromJson($json);
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
     * Copies a saved popup into a new draft with its own view and conversion counts. The original keeps its status and stats, so a live popup carries on showing while the copy is edited.
     *
     * Example:
     * ```php
     * $client->widgets->duplicateSavedPopup(
     *     'popupId',
     *     new DuplicateSavedPopupRequest([]),
     * );
     * ```
     *
     * @param string $popupId
     * @param DuplicateSavedPopupRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DuplicateSavedPopupResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function duplicateSavedPopup(string $popupId, DuplicateSavedPopupRequest $request = new DuplicateSavedPopupRequest(), ?array $options = null): ?DuplicateSavedPopupResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "popups/{$popupId}/duplicate",
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
                return DuplicateSavedPopupResponse::fromJson($json);
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
     * Compatibility path for saved signup form embed scripts. New embeds should use `/forms/{formId}/embed.js`.
     *
     * The script renders the current saved form settings when the page loads, so dashboard edits apply to deployed JavaScript embeds without copying new HTML.
     *
     * Example:
     * ```php
     * $client->widgets->getCompanyScopedSavedSignupFormEmbedScript(
     *     'companyIdOrFormId',
     *     'formId',
     * );
     * ```
     *
     * @param string $companyIdOrFormId The company ID the form belongs to
     * @param string $formId The saved form ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getCompanyScopedSavedSignupFormEmbedScript(string $companyIdOrFormId, string $formId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms/{$companyIdOrFormId}/{$formId}/embed.js",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * Load the hosted JavaScript runtime for popup signup widgets. No API key is required.
     *
     * Example:
     * ```php
     * $client->widgets->getPopupWidgetRuntime();
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
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getPopupWidgetRuntime(?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "widgets/popup.js",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * Returns a published saved form's public action URL, hosted JavaScript, minimal native form, fetch enhancement, and supported static-site platforms.
     *
     * Example:
     * ```php
     * $client->widgets->getSavedFormEmbed(
     *     'formId',
     * );
     * ```
     *
     * @param string $formId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSavedFormEmbedResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSavedFormEmbed(string $formId, ?array $options = null): ?GetSavedFormEmbedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms/embed/{$formId}",
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
                return GetSavedFormEmbedResponse::fromJson($json);
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
     * Returns one saved popup with its complete content blocks, trigger, targeting, schedule, frequency, and theme. Read this before replacing blocks so the replacement array stays complete.
     *
     * Example:
     * ```php
     * $client->widgets->getSavedPopup(
     *     'popupId',
     * );
     * ```
     *
     * @param string $popupId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSavedPopupResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSavedPopup(string $popupId, ?array $options = null): ?GetSavedPopupResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "popups/{$popupId}",
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
                return GetSavedPopupResponse::fromJson($json);
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
     * Returns a published popup's script URL plus ready-to-paste snippets for plain HTML, React and Next.js, WordPress, and Shopify. The snippets carry no API key.
     *
     * Example:
     * ```php
     * $client->widgets->getSavedPopupEmbed(
     *     'popupId',
     * );
     * ```
     *
     * @param string $popupId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSavedPopupEmbedResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSavedPopupEmbed(string $popupId, ?array $options = null): ?GetSavedPopupEmbedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "popups/embed/{$popupId}",
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
                return GetSavedPopupEmbedResponse::fromJson($json);
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
     * Load a saved signup form with one line of JavaScript. No API key is required.
     *
     * The script renders the current saved form settings when the page loads, so dashboard edits apply to deployed JavaScript embeds without copying new HTML.
     *
     * Example:
     * ```php
     * $client->widgets->getSavedSignupFormEmbedScript(
     *     'companyIdOrFormId',
     * );
     * ```
     *
     * @param string $companyIdOrFormId The saved form ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getSavedSignupFormEmbedScript(string $companyIdOrFormId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms/{$companyIdOrFormId}/embed.js",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
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
     * Lists saved signup forms for the authenticated workspace, including their server-managed audience settings and public action URLs.
     *
     * Example:
     * ```php
     * $client->widgets->listSavedForms();
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
     * @return ?ListSavedFormsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listSavedForms(?array $options = null): ?ListSavedFormsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms",
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
                return ListSavedFormsResponse::fromJson($json);
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
     * Lists saved on-site signup popups for the authenticated workspace, including their trigger, targeting, audience settings, and view and conversion counts.
     *
     * Example:
     * ```php
     * $client->widgets->listSavedPopups(
     *     new ListSavedPopupsRequest([]),
     * );
     * ```
     *
     * @param ListSavedPopupsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSavedPopupsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listSavedPopups(ListSavedPopupsRequest $request = new ListSavedPopupsRequest(), ?array $options = null): ?ListSavedPopupsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->includeContent != null) {
            $query['includeContent'] = $request->includeContent;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "popups",
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
                return ListSavedPopupsResponse::fromJson($json);
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
     * Compatibility path for saved signup form submissions. New embeds should use `/forms/{formId}`.
     *
     * The form's stored settings are the source of truth for audience targeting (lists, tags) and success behavior (success message or redirect URL), so dashboard edits apply to deployed embeds without re-embedding. List, tag, and redirect values in the request are ignored.
     *
     * Example:
     * ```php
     * $client->widgets->submitCompanyScopedSavedSignupForm(
     *     'companyIdOrFormId',
     *     'formId',
     *     new SubmitCompanyScopedSavedSignupFormRequest([
     *         'email' => 'user@example.com',
     *     ]),
     * );
     * ```
     *
     * @param string $companyIdOrFormId The company ID the form belongs to
     * @param string $formId The saved form ID
     * @param SubmitCompanyScopedSavedSignupFormRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubmitCompanyScopedSavedSignupFormResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function submitCompanyScopedSavedSignupForm(string $companyIdOrFormId, string $formId, SubmitCompanyScopedSavedSignupFormRequest $request, ?array $options = null): ?SubmitCompanyScopedSavedSignupFormResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms/{$companyIdOrFormId}/{$formId}",
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
                return SubmitCompanyScopedSavedSignupFormResponse::fromJson($json);
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
     * Submit a saved popup without an API key. The popup's stored content is the source of truth for audience targeting, duplicate handling, custom fields, and success behavior.
     *
     * Example:
     * ```php
     * $client->widgets->submitSavedPopup(
     *     'popupId',
     *     new SubmitSavedPopupRequest([
     *         'email' => 'user@example.com',
     *     ]),
     * );
     * ```
     *
     * @param string $popupId The saved popup ID
     * @param SubmitSavedPopupRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubmitSavedPopupResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function submitSavedPopup(string $popupId, SubmitSavedPopupRequest $request, ?array $options = null): ?SubmitSavedPopupResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms/popups/{$popupId}",
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
                return SubmitSavedPopupResponse::fromJson($json);
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
     * Submit a public signup form. No API key is required.
     *
     * When the path value is a saved form ID, the form's stored settings are used for audience targeting and success behavior. When the path value is a company ID, this endpoint uses the legacy company-level form behavior.
     *
     * Omit `lists` to use the workspace default lists setting, provide `lists=` to add the subscriber to no lists, or provide comma-separated list IDs for specific lists. Provide stable `tags` IDs to apply existing tags to the subscriber.
     *
     * Example:
     * ```php
     * $client->widgets->submitSignupForm(
     *     'companyIdOrFormId',
     *     new SubmitSignupFormRequest([
     *         'lists' => 'list_abc123,list_def456',
     *         'tags' => 'tag_abc123,tag_def456',
     *         'email' => 'user@example.com',
     *     ]),
     * );
     * ```
     *
     * @param string $companyIdOrFormId A saved form ID, or a company ID for legacy generated forms
     * @param SubmitSignupFormRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubmitSignupFormResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function submitSignupForm(string $companyIdOrFormId, SubmitSignupFormRequest $request, ?array $options = null): ?SubmitSignupFormResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->duplicateStrategy != null) {
            $query['duplicateStrategy'] = $request->duplicateStrategy;
        }
        if ($request->duplicateStrategyToken != null) {
            $query['duplicateStrategyToken'] = $request->duplicateStrategyToken;
        }
        if ($request->lists != null) {
            $query['lists'] = $request->lists;
        }
        if ($request->tags != null) {
            $query['tags'] = $request->tags;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms/{$companyIdOrFormId}",
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
                return SubmitSignupFormResponse::fromJson($json);
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
     * Update a saved form's name, audience targeting, copy, visual theme, or content blocks. Every field is optional - send only what should change.
     *
     * The `headline`, `description`, `buttonText`, and `successMessage` fields edit the matching content block and fail with 400 when the form has no such block; replace `blocks` for structural changes. The `blocks` array fully replaces the form's content blocks and must keep exactly one required email field and one submit button. An empty `redirectUrl` switches the form back to its confirmation message.
     *
     * Blocks render in array order and each needs a unique `id` and a `kind`. Input blocks use `kind: "form-field"` with `fieldType` (text, email, phone, number, textarea, select, radio, checkbox, consent, hidden), `name` (the custom attribute key), `label`, `placeholder`, `required`, `defaultValue`, `showLabel`, `width` (full or half), `mapsTo` (email, firstName, lastName, phone, customAttribute; defaults to customAttribute), and `options` for choice fields (`[{ value, label, id }]`, where label and id default to value). A hidden field with a `defaultValue` stores that server-owned value and ignores submitted values; a hidden field without one stores the value the page submits. Validation errors name the offending property, for example `blocks[3].options[0].value`.
     *
     * Example:
     * ```php
     * $client->widgets->updateSavedForm(
     *     'companyIdOrFormId',
     *     new UpdateSavedFormRequest([]),
     * );
     * ```
     *
     * @param string $companyIdOrFormId The saved form ID to update
     * @param UpdateSavedFormRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSavedFormResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateSavedForm(string $companyIdOrFormId, UpdateSavedFormRequest $request = new UpdateSavedFormRequest(), ?array $options = null): ?UpdateSavedFormResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "forms/{$companyIdOrFormId}",
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
                return UpdateSavedFormResponse::fromJson($json);
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
     * Updates a saved popup. Only the fields you send change.
     *
     * Set `status` to `published` to make the popup live, or `draft` to stop it showing while keeping the popup, its stats, and its embed script. `trigger`, `targeting`, `schedule`, `frequency`, and `visual` are merged key by key, so patching one key keeps the rest.
     *
     * Example:
     * ```php
     * $client->widgets->updateSavedPopup(
     *     'popupId',
     *     new UpdateSavedPopupRequest([]),
     * );
     * ```
     *
     * @param string $popupId
     * @param UpdateSavedPopupRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSavedPopupResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateSavedPopup(string $popupId, UpdateSavedPopupRequest $request = new UpdateSavedPopupRequest(), ?array $options = null): ?UpdateSavedPopupResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "popups/{$popupId}",
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
                return UpdateSavedPopupResponse::fromJson($json);
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
