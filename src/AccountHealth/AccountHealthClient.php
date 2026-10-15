<?php

namespace Sequenzy\AccountHealth;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Types\AccountHealthFixResult;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\AccountHealth\Types\GetAccountHealthResponse;
use Sequenzy\AccountHealth\Types\RunAccountHealthCheckResponse;
use Sequenzy\AccountHealth\Requests\UpdateAccountHealthInsightRequest;
use Sequenzy\AccountHealth\Types\UpdateAccountHealthInsightResponse;
use Sequenzy\Types\AccountHealthSettings;
use Sequenzy\AccountHealth\Types\UpdateAccountHealthSettingsResponse;

class AccountHealthClient
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
     * Builds the draft sequence an "event without a sequence" (unhandled_event) or "missing sequence" (missing_sequence) finding asks for, with its trigger, timing and titled email steps, then writes the emails with AI like a sequence from a template. An unhandled_event draft is triggered by its event; a missing_sequence draft uses the trigger and steps in the finding's evidence (new contacts, an event, or manual enrollment). It stays inactive until you enable it. Calling it again returns the existing draft with created false; email steps that still have no email (for example a draft the weekly check laid out that nobody opened yet) are written then, and existing emails are never rewritten. Requires the sequences:write scope.
     *
     * Example:
     * ```php
     * $client->accountHealth->createAccountHealthFix(
     *     'insightId',
     * );
     * ```
     *
     * @param string $insightId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AccountHealthFixResult
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createAccountHealthFix(string $insightId, ?array $options = null): ?AccountHealthFixResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-health/insights/{$insightId}/fix",
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
                return AccountHealthFixResult::fromJson($json);
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
     * Returns the account health report for the active company - the schedule, AI budget and spend, the latest check with its AI summary and stats, and open and snoozed insights, most severe first. Checks run for companies with more than 1,000 active subscribers that sent email in the last 14 days. Requires the analytics:read scope.
     *
     * Example:
     * ```php
     * $client->accountHealth->getAccountHealth();
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
     * @return ?GetAccountHealthResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getAccountHealth(?array $options = null): ?GetAccountHealthResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-health",
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
                return GetAccountHealthResponse::fromJson($json);
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
     * Queues an account health check now. A check that is already queued or running is returned instead, with alreadyInProgress true. Manual checks never send the report email, are limited to one every 10 minutes, and wait a day after a check that left findings open. Poll Get account health until runInProgress is false. Requires the sequences:write scope.
     *
     * Example:
     * ```php
     * $client->accountHealth->runAccountHealthCheck();
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
     * @return ?RunAccountHealthCheckResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function runAccountHealthCheck(?array $options = null): ?RunAccountHealthCheckResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-health/runs",
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
                return RunAccountHealthCheckResponse::fromJson($json);
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
     * Dismisses, snoozes, resolves or reopens one insight. A resolved insight reopens if the next check still finds it; a dismissed one stays hidden. Requires the sequences:write scope.
     *
     * Example:
     * ```php
     * $client->accountHealth->updateAccountHealthInsight(
     *     'insightId',
     *     new UpdateAccountHealthInsightRequest([
     *         'action' => UpdateAccountHealthInsightRequestAction::Dismiss->value,
     *     ]),
     * );
     * ```
     *
     * @param string $insightId
     * @param UpdateAccountHealthInsightRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateAccountHealthInsightResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateAccountHealthInsight(string $insightId, UpdateAccountHealthInsightRequest $request, ?array $options = null): ?UpdateAccountHealthInsightResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-health/insights/{$insightId}",
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
                return UpdateAccountHealthInsightResponse::fromJson($json);
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
     * Turns the weekly account health check (Mondays, 05:00 UTC) on or off and chooses whether it drafts fixes. Pass only the fields to change; unknown fields are rejected. Who gets the findings is each person's account_health notification preference. Requires the companies:manage scope plus owner or admin access.
     *
     * Example:
     * ```php
     * $client->accountHealth->updateAccountHealthSettings(
     *     new AccountHealthSettings([]),
     * );
     * ```
     *
     * @param AccountHealthSettings $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateAccountHealthSettingsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateAccountHealthSettings(AccountHealthSettings $request, ?array $options = null): ?UpdateAccountHealthSettingsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "account-health/settings",
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
                return UpdateAccountHealthSettingsResponse::fromJson($json);
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
