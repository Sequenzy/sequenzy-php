<?php

namespace Sequenzy\SenderProfiles;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\SenderProfiles\Types\ListSenderProfilesResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\SenderProfiles\Requests\UpdateSenderProfilesRequest;
use Sequenzy\SenderProfiles\Types\UpdateSenderProfilesResponse;
use Sequenzy\SenderProfiles\Requests\UpdateReplyProfileRequest;
use Sequenzy\SenderProfiles\Types\UpdateReplyProfileResponse;

class SenderProfilesClient
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
     * Lists sender (From) and reply-to profiles, which are the account defaults, and whether each sender address sits on a verified sending domain. SMTP submission sends into Sequenzy; outbound delivery remains Sequenzy-managed through SES or Sequenzy's MTA, so customer-managed SMTP relays are not supported.
     *
     * Example:
     * ```php
     * $client->senderProfiles->list();
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
     * @return ?ListSenderProfilesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(?array $options = null): ?ListSenderProfilesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sender-profiles",
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
                return ListSenderProfilesResponse::fromJson($json);
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
     * Renames one sender (From) profile in place. Only the display name changes - the address, its sending domain, and the account-wide default From selection are left untouched, so a display name can be standardized across the several identities one mailbox may carry. To change which profile is the account default instead, use PATCH /v1/companies/{companyId} with senderProfileId. Requires companies:manage.
     *
     * Example:
     * ```php
     * $client->senderProfiles->update(
     *     'id',
     *     new UpdateSenderProfilesRequest([
     *         'name' => 'SnapCount',
     *     ]),
     * );
     * ```
     *
     * @param string $id Sender profile ID, from GET /v1/sender-profiles.
     * @param UpdateSenderProfilesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSenderProfilesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $id, UpdateSenderProfilesRequest $request, ?array $options = null): ?UpdateSenderProfilesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sender-profiles/{$id}",
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
                return UpdateSenderProfilesResponse::fromJson($json);
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
     * Renames one reply-to profile in place. Only the display name changes - the address and the account-wide default Reply-To selection are left untouched. Requires companies:manage.
     *
     * Example:
     * ```php
     * $client->senderProfiles->updateReplyProfile(
     *     'id',
     *     new UpdateReplyProfileRequest([
     *         'name' => 'SnapCount',
     *     ]),
     * );
     * ```
     *
     * @param string $id Reply-to profile ID, from GET /v1/sender-profiles.
     * @param UpdateReplyProfileRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateReplyProfileResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateReplyProfile(string $id, UpdateReplyProfileRequest $request, ?array $options = null): ?UpdateReplyProfileResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "reply-profiles/{$id}",
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
                return UpdateReplyProfileResponse::fromJson($json);
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
