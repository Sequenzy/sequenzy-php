<?php

namespace Sequenzy\Integrations;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Integrations\Types\ActivatePixelIntegrationsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Integrations\Requests\ConnectIntegrationsRequest;
use Sequenzy\Integrations\Types\ConnectIntegrationsResponse;
use Sequenzy\Types\IntegrationDetail;
use Sequenzy\Types\IntegrationPixelState;
use Sequenzy\Integrations\Requests\ListIntegrationsRequest;
use Sequenzy\Integrations\Types\ListIntegrationsResponse;
use Sequenzy\Integrations\Requests\ListActivityIntegrationsRequest;
use Sequenzy\Integrations\Types\ListActivityIntegrationsResponse;
use Sequenzy\Integrations\Requests\ListCapabilitiesIntegrationsRequest;
use Sequenzy\Integrations\Types\ListCapabilitiesIntegrationsResponse;
use Sequenzy\Integrations\Types\SyncIntegrationsResponse;
use Sequenzy\Integrations\Requests\UpdateSyncIntegrationsRequest;
use Sequenzy\Integrations\Types\UpdateSyncIntegrationsResponse;

class IntegrationsClient
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
     * Installs the Shopify storefront tracking pixel, or repoints an existing one at this account. Idempotent - an already-live pixel returns changed false without writing to the store. Events start arriving on the next storefront visit; nothing is backfilled. Fails with a 400 naming the reconnect step when the store granted an older permission set. Shopify only. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->integrations->activatePixel(
     *     'id',
     * );
     * ```
     *
     * @param string $id Shopify integration ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ActivatePixelIntegrationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function activatePixel(string $id, ?array $options = null): ?ActivatePixelIntegrationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/{$id}/pixel",
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
                return ActivatePixelIntegrationsResponse::fromJson($json);
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
     * Connects an API-key / webhook-secret integration: polar, paddle, dodo, whop, creem, chargebee, clerk, posthog, segment, or affonso. Credentials are validated against the provider where possible, stored encrypted, and never returned. Payment providers queue their initial revenue backfill; Affonso queues its affiliate backfill; PostHog and Segment can optionally import event history. The response includes the webhookUrl to configure at the provider with the same secret. Reconnecting replaces stored credentials. OAuth and app-install providers (Stripe, Shopify, Supabase, GitHub, WooCommerce, Meta) return a 400 pointing at the dashboard. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->integrations->connect(
     *     new ConnectIntegrationsRequest([
     *         'provider' => ConnectIntegrationsRequestProvider::Polar->value,
     *         'webhookSecret' => 'webhookSecret',
     *     ]),
     * );
     * ```
     *
     * @param ConnectIntegrationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ConnectIntegrationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function connect(ConnectIntegrationsRequest $request, ?array $options = null): ?ConnectIntegrationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/connect",
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
                return ConnectIntegrationsResponse::fromJson($json);
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
     * Inspects one connected integration - what the provider syncs, every event it emits, the tags each event applies through the company's sync rules, the sequences that trigger on those events, recent activity, the ingestion block naming which lists its contacts join, and prioritized recommendations. Credentials are never returned. Requires the account:read, subscribers:read, sequences:read, and lists:read scopes.
     *
     * Example:
     * ```php
     * $client->integrations->get(
     *     'id',
     * );
     * ```
     *
     * @param string $id Integration ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?IntegrationDetail
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $id, ?array $options = null): ?IntegrationDetail
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/{$id}",
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
                return IntegrationDetail::fromJson($json);
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
     * Reads the live state of a Shopify store's storefront tracking pixel. Nothing about the pixel is stored locally, so this queries the store on every call. A confirmed missing or stale pixel prevents on-site events (product views, cart activity, browse abandonment) from arriving; a Shopify read error reports the state as unknown instead. Shopify only. Requires the account:read scope.
     *
     * Example:
     * ```php
     * $client->integrations->getPixel(
     *     'id',
     * );
     * ```
     *
     * @param string $id Shopify integration ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?IntegrationPixelState
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getPixel(string $id, ?array $options = null): ?IntegrationPixelState
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/{$id}/pixel",
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
                return IntegrationPixelState::fromJson($json);
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
     * Lists connected integrations with connection state, sync health, last sync error, and any records the last sync could not import normally. Credentials, access tokens, and webhook secrets are never returned.
     *
     * Example:
     * ```php
     * $client->integrations->list(
     *     new ListIntegrationsRequest([]),
     * );
     * ```
     *
     * @param ListIntegrationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListIntegrationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListIntegrationsRequest $request = new ListIntegrationsRequest(), ?array $options = null): ?ListIntegrationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->includeInactive != null) {
            $query['includeInactive'] = $request->includeInactive;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations",
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
                return ListIntegrationsResponse::fromJson($json);
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
     * Recent integration webhook and sync activity, newest first. Retained for 24 hours. Payloads are sanitized when written, so no credentials or signatures appear. Requires the account:read and subscribers:read scopes.
     *
     * Example:
     * ```php
     * $client->integrations->listActivity(
     *     new ListActivityIntegrationsRequest([]),
     * );
     * ```
     *
     * @param ListActivityIntegrationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListActivityIntegrationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listActivity(ListActivityIntegrationsRequest $request = new ListActivityIntegrationsRequest(), ?array $options = null): ?ListActivityIntegrationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->integrationId != null) {
            $query['integrationId'] = $request->integrationId;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->provider != null) {
            $query['provider'] = $request->provider;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/activity",
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
                return ListActivityIntegrationsResponse::fromJson($json);
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
     * Describes what each integration provider syncs, which events it emits and when, the subscriber attributes it writes, and which actions it supports. Works whether or not the provider is connected, so it can be used to compare providers before connecting one.
     *
     * Example:
     * ```php
     * $client->integrations->listCapabilities(
     *     new ListCapabilitiesIntegrationsRequest([]),
     * );
     * ```
     *
     * @param ListCapabilitiesIntegrationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCapabilitiesIntegrationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listCapabilities(ListCapabilitiesIntegrationsRequest $request = new ListCapabilitiesIntegrationsRequest(), ?array $options = null): ?ListCapabilitiesIntegrationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->category != null) {
            $query['category'] = $request->category;
        }
        if ($request->provider != null) {
            $query['provider'] = $request->provider;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/catalog",
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
                return ListCapabilitiesIntegrationsResponse::fromJson($json);
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
     * Queues a manual re-sync for a connected integration - customers and revenue for a payment provider (Stripe, Polar, Paddle, Dodo, Creem, Chargebee, Whop), the user backfill for Supabase, or the event-history import for PostHog and Segment. The Supabase sync reads the project, schema, and table already configured for the integration and returns 400 when none is configured. PostHog and Segment re-run their event-history imports with credentials stored at connect time and are the supported retry path for failed imports; each restarts from the beginning, already-imported events dedupe, and returns 409 while queued or syncing. Segment requires a saved Unify space ID and Profile API token and covers the most recent 14 days served by the Profile API. Terminal BullMQ failures release imports for retry. Returns immediately; poll the integration to watch syncStatus. Other providers re-sync from the dashboard. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->integrations->sync(
     *     'id',
     * );
     * ```
     *
     * @param string $id Integration ID.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SyncIntegrationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function sync(string $id, ?array $options = null): ?SyncIntegrationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/{$id}/sync",
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
                return SyncIntegrationsResponse::fromJson($json);
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
     * Controls what a connected integration does to the contact list. Two independent settings - `syncEnabled` turns bulk imports and backfills on or off, and `listIds` chooses which lists the contacts the provider's live webhook creates join. Neither stops that webhook: disabling bulk sync only pauses full imports, and list targeting changes membership only. Contacts are still created, their attributes still sync, sync-rule tags still apply, and default any_contact sequences still enroll them. Explicit any_list and specific-list sequences require a matching membership and do not enroll a list-less contact. `listIds` takes effect on future provider writes: nothing is applied retroactively and nobody is ever removed from a list. Wix or Webflow submissions, Shopify customer updates, and Supabase resubscriptions can add an existing contact to the new targets; Stripe applies targeting only when its webhook creates a subscriber. Provider support is declared in the catalog's `actions` as set_list_targeting. At least one field is required, an in-flight sync must finish before bulk sync can be disabled, and setting the current state succeeds with `changed: false`. Requires the integrations:manage scope.
     *
     * Example:
     * ```php
     * $client->integrations->updateSync(
     *     'id',
     *     new UpdateSyncIntegrationsRequest([]),
     * );
     * ```
     *
     * @param string $id Integration ID.
     * @param UpdateSyncIntegrationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSyncIntegrationsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateSync(string $id, UpdateSyncIntegrationsRequest $request = new UpdateSyncIntegrationsRequest(), ?array $options = null): ?UpdateSyncIntegrationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "integrations/{$id}",
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
                return UpdateSyncIntegrationsResponse::fromJson($json);
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
