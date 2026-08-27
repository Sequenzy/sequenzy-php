<?php

namespace Sequenzy\SendingStatus;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Types\SendingStatus;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\SendingStatus\Requests\ResumeSendingStatusRequest;
use Sequenzy\SendingStatus\Types\ResumeSendingStatusResponse;

class SendingStatusClient
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
     * Returns whether company-level sending is active, paused, or suspended, the pause reason, the sender-health counts and thresholds behind it, the automated review state, whether sending can be restored without support, and ordered remediation steps. Call this whenever a send or test send fails for a reason that is not a validation error. Enforcement uses all-time totals from a reset watermark rather than a rolling window, so metricsWindow.expiresAt is always null and waiting does not restore sending. Requires the account:read scope.
     *
     * Example:
     * ```php
     * $client->sendingStatus->get();
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
     * @return ?SendingStatus
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(?array $options = null): ?SendingStatus
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sending-status",
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
                return SendingStatus::fromJson($json);
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
     * Restores company-level sending paused by a high permanent-bounce rate, after the cause has been fixed. This is not a bypass - it enforces the same gates as the dashboard and never removes suppressions. For a paused workspace, sending is restored only when selfResume.canSelfResume is true on GET /sending-status, which requires a high_hard_bounce_rate pause, a cleared automated sender-health review, and no admin block. An already-active workspace succeeds as an idempotent no-op with resumed false. On restoration the bounce watermark moves to now and the service attempts to requeue paused campaigns plus due sequence steps. A partial queue handoff still returns the committed active state with recovery guidance in message. Requires the companies:manage scope plus owner or admin access.
     *
     * Example:
     * ```php
     * $client->sendingStatus->resume(
     *     new ResumeSendingStatusRequest([
     *         'listSanitizationConfirmed' => true,
     *     ]),
     * );
     * ```
     *
     * @param ResumeSendingStatusRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ResumeSendingStatusResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function resume(ResumeSendingStatusRequest $request, ?array $options = null): ?ResumeSendingStatusResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sending-status/resume",
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
                return ResumeSendingStatusResponse::fromJson($json);
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
