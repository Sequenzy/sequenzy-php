<?php

namespace Sequenzy\SyncRules;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\SyncRules\Types\GetSyncRulesResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\SyncRules\Requests\UpdateSyncRulesRequest;
use Sequenzy\SyncRules\Types\UpdateSyncRulesResponse;

class SyncRulesClient
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
     * Returns the company's effective sync rules - the automatic tag changes applied when events fire. New companies start with an empty rule set; legacy companies may inherit the optional SaaS/ecommerce platform preset. isDefault reports whether that preset is active.
     *
     * Example:
     * ```php
     * $client->syncRules->get();
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
     * @return ?GetSyncRulesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(?array $options = null): ?GetSyncRulesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sync-rules",
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
                return GetSyncRulesResponse::fromJson($json);
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
     * Replaces the company's full sync rule set. Send an empty array to disable rules, or null to opt into the inherited SaaS/ecommerce platform preset. This is not a partial update - fetch the current rules, edit them, and send the whole set back.
     *
     * Example:
     * ```php
     * $client->syncRules->update(
     *     new UpdateSyncRulesRequest([
     *         'syncRules' => [
     *             new SyncRule([
     *                 'actions' => new SyncRuleActions([
     *                     'addTags' => [
     *                         'vinyl-collector',
     *                     ],
     *                     'removeTags' => [
     *                         'removeTags',
     *                     ],
     *                 ]),
     *                 'conditions' => new SyncRuleConditions([
     *                     'purchasedProduct' => new SyncRuleConditionsPurchasedProduct([
     *                         'tags' => [
     *                             'Vinyl',
     *                         ],
     *                     ]),
     *                 ]),
     *                 'triggerEvent' => 'ecommerce.order_placed',
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param UpdateSyncRulesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSyncRulesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(UpdateSyncRulesRequest $request, ?array $options = null): ?UpdateSyncRulesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "sync-rules",
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
                return UpdateSyncRulesResponse::fromJson($json);
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
