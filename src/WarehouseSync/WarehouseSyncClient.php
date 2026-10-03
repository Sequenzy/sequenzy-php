<?php

namespace Sequenzy\WarehouseSync;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\WarehouseSync\Requests\CreateWarehouseConnectionRequest;
use Sequenzy\WarehouseSync\Types\CreateWarehouseConnectionResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\WarehouseSync\Requests\CreateWarehouseSyncRequest;
use Sequenzy\WarehouseSync\Types\CreateWarehouseSyncResponse;
use Sequenzy\WarehouseSync\Types\DeleteWarehouseConnectionResponse;
use Sequenzy\WarehouseSync\Types\DeleteWarehouseSyncResponse;
use Sequenzy\WarehouseSync\Types\GetWarehouseConnectionResponse;
use Sequenzy\WarehouseSync\Types\GetWarehouseSyncResponse;
use Sequenzy\WarehouseSync\Types\ListWarehouseConnectionsResponse;
use Sequenzy\WarehouseSync\Requests\ListWarehouseSyncRunsRequest;
use Sequenzy\WarehouseSync\Types\ListWarehouseSyncRunsResponse;
use Sequenzy\WarehouseSync\Requests\ListWarehouseSyncsRequest;
use Sequenzy\WarehouseSync\Types\ListWarehouseSyncsResponse;
use Sequenzy\WarehouseSync\Requests\PreviewWarehouseQueryRequest;
use Sequenzy\WarehouseSync\Types\PreviewWarehouseQueryResponse;
use Sequenzy\WarehouseSync\Requests\RunWarehouseSyncRequest;
use Sequenzy\WarehouseSync\Types\RunWarehouseSyncResponse;
use Sequenzy\WarehouseSync\Types\TestWarehouseConnectionResponse;
use Sequenzy\WarehouseSync\Requests\UpdateWarehouseConnectionRequest;
use Sequenzy\WarehouseSync\Types\UpdateWarehouseConnectionResponse;
use Sequenzy\WarehouseSync\Requests\UpdateWarehouseSyncRequest;
use Sequenzy\WarehouseSync\Types\UpdateWarehouseSyncResponse;

class WarehouseSyncClient
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
     * Connects Snowflake, BigQuery, Redshift or Postgres. Sequenzy runs a test query before saving; nothing is saved when it fails. Redshift and Postgres hosts must resolve to public addresses. Requires warehouse:write.
     *
     * Example:
     * ```php
     * $client->warehouseSync->createWarehouseConnection(
     *     new CreateWarehouseConnectionRequest([
     *         'config' => [
     *             'key' => "value",
     *         ],
     *         'credentials' => [
     *             'key' => "value",
     *         ],
     *         'name' => 'name',
     *         'provider' => CreateWarehouseConnectionRequestProvider::Snowflake->value,
     *     ]),
     * );
     * ```
     *
     * @param CreateWarehouseConnectionRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateWarehouseConnectionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createWarehouseConnection(CreateWarehouseConnectionRequest $request, ?array $options = null): ?CreateWarehouseConnectionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-connections",
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
                return CreateWarehouseConnectionResponse::fromJson($json);
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
     * Creates a sync that runs a query on a schedule and sends changed rows to Sequenzy: contacts (kind subscribers) through the import pipeline, or events on existing contacts (kind events). The mapping and cursor are checked against the query's real columns and the first run starts right away. Requires warehouse:write and subscribers:write; event syncs also need events:write, and triggerAutomations or double_opt_in need automations:trigger.
     *
     * Example:
     * ```php
     * $client->warehouseSync->createWarehouseSync(
     *     new CreateWarehouseSyncRequest([
     *         'connectionId' => 'connectionId',
     *         'kind' => CreateWarehouseSyncRequestKind::Subscribers->value,
     *         'mapping' => new CreateWarehouseSyncRequestMapping([]),
     *         'name' => 'name',
     *         'query' => 'query',
     *     ]),
     * );
     * ```
     *
     * @param CreateWarehouseSyncRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateWarehouseSyncResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createWarehouseSync(CreateWarehouseSyncRequest $request, ?array $options = null): ?CreateWarehouseSyncResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-syncs",
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
                return CreateWarehouseSyncResponse::fromJson($json);
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
     * Deletes a connection and its stored credentials. Returns 409 while syncs still use it. Requires warehouse:delete.
     *
     * Example:
     * ```php
     * $client->warehouseSync->deleteWarehouseConnection(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteWarehouseConnectionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteWarehouseConnection(string $id, ?array $options = null): ?DeleteWarehouseConnectionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-connections/{$id}",
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
                return DeleteWarehouseConnectionResponse::fromJson($json);
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
     * Deletes a sync and its run history. Contacts and events already imported stay. Requires warehouse:delete.
     *
     * Example:
     * ```php
     * $client->warehouseSync->deleteWarehouseSync(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteWarehouseSyncResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function deleteWarehouseSync(string $id, ?array $options = null): ?DeleteWarehouseSyncResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-syncs/{$id}",
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
                return DeleteWarehouseSyncResponse::fromJson($json);
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
     * Returns one connection.
     *
     * Example:
     * ```php
     * $client->warehouseSync->getWarehouseConnection(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetWarehouseConnectionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getWarehouseConnection(string $id, ?array $options = null): ?GetWarehouseConnectionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-connections/{$id}",
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
                return GetWarehouseConnectionResponse::fromJson($json);
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
     * Returns one sync with its latest run.
     *
     * Example:
     * ```php
     * $client->warehouseSync->getWarehouseSync(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetWarehouseSyncResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getWarehouseSync(string $id, ?array $options = null): ?GetWarehouseSyncResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-syncs/{$id}",
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
                return GetWarehouseSyncResponse::fromJson($json);
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
     * Lists warehouse connections with status, last test and number of syncs. Credentials are never returned. Requires warehouse:read.
     *
     * Example:
     * ```php
     * $client->warehouseSync->listWarehouseConnections();
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
     * @return ?ListWarehouseConnectionsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listWarehouseConnections(?array $options = null): ?ListWarehouseConnectionsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-connections",
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
                return ListWarehouseConnectionsResponse::fromJson($json);
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
     * Lists runs from the last 30 days, newest first, with row counts, sample row problems and import progress.
     *
     * Example:
     * ```php
     * $client->warehouseSync->listWarehouseSyncRuns(
     *     'id',
     *     new ListWarehouseSyncRunsRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param ListWarehouseSyncRunsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWarehouseSyncRunsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listWarehouseSyncRuns(string $id, ListWarehouseSyncRunsRequest $request = new ListWarehouseSyncRunsRequest(), ?array $options = null): ?ListWarehouseSyncRunsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-syncs/{$id}/runs",
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
                return ListWarehouseSyncRunsResponse::fromJson($json);
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
     * Lists syncs with schedule, status, cursor position and the latest run, including progress of the subscriber imports it queued. Requires warehouse:read.
     *
     * Example:
     * ```php
     * $client->warehouseSync->listWarehouseSyncs(
     *     new ListWarehouseSyncsRequest([]),
     * );
     * ```
     *
     * @param ListWarehouseSyncsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWarehouseSyncsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function listWarehouseSyncs(ListWarehouseSyncsRequest $request = new ListWarehouseSyncsRequest(), ?array $options = null): ?ListWarehouseSyncsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->connectionId != null) {
            $query['connectionId'] = $request->connectionId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-syncs",
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
                return ListWarehouseSyncsResponse::fromJson($json);
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
     * Runs a SELECT query with a 20-row limit and returns its columns and rows, to build a sync mapping. Requires warehouse:write.
     *
     * Example:
     * ```php
     * $client->warehouseSync->previewWarehouseQuery(
     *     'id',
     *     new PreviewWarehouseQueryRequest([
     *         'query' => 'query',
     *     ]),
     * );
     * ```
     *
     * @param string $id
     * @param PreviewWarehouseQueryRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PreviewWarehouseQueryResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function previewWarehouseQuery(string $id, PreviewWarehouseQueryRequest $request, ?array $options = null): ?PreviewWarehouseQueryResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-connections/{$id}/preview",
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
                return PreviewWarehouseQueryResponse::fromJson($json);
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
     * Queues a run now. Only one run per sync executes at a time; a request made while a run is in progress runs right after it. With fullResync, the run forgets which rows were sent and the cursor position, and sends every row again. A full resync of a sync that starts automations or sends double opt-in emails needs automations:trigger.
     *
     * Example:
     * ```php
     * $client->warehouseSync->runWarehouseSync(
     *     'id',
     *     new RunWarehouseSyncRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param RunWarehouseSyncRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RunWarehouseSyncResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function runWarehouseSync(string $id, RunWarehouseSyncRequest $request = new RunWarehouseSyncRequest(), ?array $options = null): ?RunWarehouseSyncResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-syncs/{$id}/run",
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
                return RunWarehouseSyncResponse::fromJson($json);
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
     * Runs a test query with the stored credentials and records the result on the connection.
     *
     * Example:
     * ```php
     * $client->warehouseSync->testWarehouseConnection(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TestWarehouseConnectionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function testWarehouseConnection(string $id, ?array $options = null): ?TestWarehouseConnectionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-connections/{$id}/test",
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
                return TestWarehouseConnectionResponse::fromJson($json);
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
     * Renames a connection, changes its settings or rotates its credentials. Settings and credential changes are re-tested before saving.
     *
     * Example:
     * ```php
     * $client->warehouseSync->updateWarehouseConnection(
     *     'id',
     *     new UpdateWarehouseConnectionRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param UpdateWarehouseConnectionRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateWarehouseConnectionResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateWarehouseConnection(string $id, UpdateWarehouseConnectionRequest $request = new UpdateWarehouseConnectionRequest(), ?array $options = null): ?UpdateWarehouseConnectionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-connections/{$id}",
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
                return UpdateWarehouseConnectionResponse::fromJson($json);
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
     * Changes a sync. Omitted fields keep their current values. Query, mapping and cursor changes are checked against the query's columns; a changed query or cursor reads from the beginning again, while unchanged rows are still skipped. Other changes do not contact the warehouse. Saving makes the caller the user imports run as. On a sync that starts automations or sends double opt-in emails, changing the query, mapping, cursor or lists needs automations:trigger. A run in progress stops at its next page and runs again with the new settings.
     *
     * Example:
     * ```php
     * $client->warehouseSync->updateWarehouseSync(
     *     'id',
     *     new UpdateWarehouseSyncRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param UpdateWarehouseSyncRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateWarehouseSyncResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateWarehouseSync(string $id, UpdateWarehouseSyncRequest $request = new UpdateWarehouseSyncRequest(), ?array $options = null): ?UpdateWarehouseSyncResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "warehouse-syncs/{$id}",
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
                return UpdateWarehouseSyncResponse::fromJson($json);
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
