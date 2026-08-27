<?php

namespace Sequenzy\EmailSends;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\EmailSends\Types\GetEmailSendsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\EmailSends\Requests\ListEmailSendsRequest;
use Sequenzy\EmailSends\Types\ListEmailSendsResponse;

class EmailSendsClient
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
     * Gets an email delivery snapshot by ID, including queued and test sends, the stored HTML body when available, and retained ClickHouse events when the short-lived row has been cleaned up. Test sends remain hidden from sent-email history but are available through this exact-ID endpoint while their row is retained.
     *
     * Example:
     * ```php
     * $client->emailSends->get(
     *     'emailSendId',
     * );
     * ```
     *
     * @param string $emailSendId Email send ID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetEmailSendsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $emailSendId, ?array $options = null): ?GetEmailSendsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-sends/{$emailSendId}",
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
                return GetEmailSendsResponse::fromJson($json);
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
     * Lists the recent 14-day delivery history with dashboard-equivalent subject, recipient, status, type, bounce, source, pagination, and sorting filters. Successful test sends and copied-recipient bookkeeping rows are hidden; a test send that failed, bounced, or was suppressed IS listed, flagged with an `isTestEmail` value of true, because it is the only record of a test that never arrived.
     *
     * Example:
     * ```php
     * $client->emailSends->list(
     *     new ListEmailSendsRequest([]),
     * );
     * ```
     *
     * @param ListEmailSendsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailSendsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListEmailSendsRequest $request = new ListEmailSendsRequest(), ?array $options = null): ?ListEmailSendsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->automationId != null) {
            $query['automationId'] = $request->automationId;
        }
        if ($request->automationNodeId != null) {
            $query['automationNodeId'] = $request->automationNodeId;
        }
        if ($request->bounceType != null) {
            $query['bounceType'] = $request->bounceType;
        }
        if ($request->campaignId != null) {
            $query['campaignId'] = $request->campaignId;
        }
        if ($request->days != null) {
            $query['days'] = $request->days;
        }
        if ($request->emailType != null) {
            $query['emailType'] = $request->emailType;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->q != null) {
            $query['q'] = $request->q;
        }
        if ($request->recipient != null) {
            $query['recipient'] = $request->recipient;
        }
        if ($request->search != null) {
            $query['search'] = $request->search;
        }
        if ($request->sortField != null) {
            $query['sortField'] = $request->sortField;
        }
        if ($request->sortOrder != null) {
            $query['sortOrder'] = $request->sortOrder;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->subject != null) {
            $query['subject'] = $request->subject;
        }
        if ($request->title != null) {
            $query['title'] = $request->title;
        }
        if ($request->transactionalEmailId != null) {
            $query['transactionalEmailId'] = $request->transactionalEmailId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-sends",
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
                return ListEmailSendsResponse::fromJson($json);
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
