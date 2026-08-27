<?php

namespace Sequenzy\EmailComponents;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\EmailComponents\Requests\CreateEmailComponentsRequest;
use Sequenzy\EmailComponents\Types\CreateEmailComponentsResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\EmailComponents\Types\DeleteEmailComponentsResponse;
use Sequenzy\EmailComponents\Types\GetEmailComponentsResponse;
use Sequenzy\EmailComponents\Types\GetDefaultEmailComponentsRequestSlot;
use Sequenzy\EmailComponents\Types\GetDefaultEmailComponentsResponse;
use Sequenzy\EmailComponents\Requests\ListEmailComponentsRequest;
use Sequenzy\EmailComponents\Types\ListEmailComponentsResponse;
use Sequenzy\EmailComponents\Types\SetDefaultEmailComponentsRequestSlot;
use Sequenzy\EmailComponents\Requests\SetDefaultEmailComponentsRequest;
use Sequenzy\EmailComponents\Types\SetDefaultEmailComponentsResponse;
use Sequenzy\EmailComponents\Requests\UpdateEmailComponentsRequest;
use Sequenzy\EmailComponents\Types\UpdateEmailComponentsResponse;

class EmailComponentsClient
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
     * Creates a reusable email component from a block list. Component names are unique per company.
     *
     * Example:
     * ```php
     * $client->emailComponents->create(
     *     new CreateEmailComponentsRequest([
     *         'blocks' => [
     *             new EmailBlock([
     *                 'type' => EmailBlockType::Text->value,
     *             ]),
     *         ],
     *         'name' => 'Promo banner',
     *     ]),
     * );
     * ```
     *
     * @param CreateEmailComponentsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateEmailComponentsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function create(CreateEmailComponentsRequest $request, ?array $options = null): ?CreateEmailComponentsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-components",
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
                return CreateEmailComponentsResponse::fromJson($json);
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
     * Deletes an email component. Emails that already rendered it keep their copied blocks. Deleting the pinned default footer makes new emails fall back to the generated footer.
     *
     * Example:
     * ```php
     * $client->emailComponents->delete(
     *     'componentId',
     * );
     * ```
     *
     * @param string $componentId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteEmailComponentsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function delete(string $componentId, ?array $options = null): ?DeleteEmailComponentsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-components/{$componentId}",
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
                return DeleteEmailComponentsResponse::fromJson($json);
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
     * Returns a single email component by id.
     *
     * Example:
     * ```php
     * $client->emailComponents->get(
     *     'componentId',
     * );
     * ```
     *
     * @param string $componentId
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetEmailComponentsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function get(string $componentId, ?array $options = null): ?GetEmailComponentsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-components/{$componentId}",
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
                return GetEmailComponentsResponse::fromJson($json);
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
     * Returns the component used as the company default for a slot. A 404 means emails fall back to the generated footer.
     *
     * Example:
     * ```php
     * $client->emailComponents->getDefault(
     *     GetDefaultEmailComponentsRequestSlot::Footer->value,
     * );
     * ```
     *
     * @param value-of<GetDefaultEmailComponentsRequestSlot> $slot
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetDefaultEmailComponentsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getDefault(string $slot, ?array $options = null): ?GetDefaultEmailComponentsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-components/defaults/{$slot}",
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
                return GetDefaultEmailComponentsResponse::fromJson($json);
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
     * Lists reusable email components newest first, including the components pinned as company defaults.
     *
     * Example:
     * ```php
     * $client->emailComponents->list(
     *     new ListEmailComponentsRequest([]),
     * );
     * ```
     *
     * @param ListEmailComponentsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailComponentsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function list(ListEmailComponentsRequest $request = new ListEmailComponentsRequest(), ?array $options = null): ?ListEmailComponentsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->defaultsOnly != null) {
            $query['defaultsOnly'] = $request->defaultsOnly;
        }
        if ($request->slot != null) {
            $query['slot'] = $request->slot;
        }
        if ($request->type != null) {
            $query['type'] = $request->type;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-components",
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
                return ListEmailComponentsResponse::fromJson($json);
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
     * Creates or replaces the company default component for a slot. New sequence, campaign, and AI-generated emails clone this component when they are built. A default footer always keeps its unsubscribe link enabled; transactional sends hide it at render time. Emails that already exist keep the footer they were built with.
     *
     * Example:
     * ```php
     * $client->emailComponents->setDefault(
     *     SetDefaultEmailComponentsRequestSlot::Footer->value,
     *     new SetDefaultEmailComponentsRequest([
     *         'blocks' => [
     *             new EmailBlock([
     *                 'type' => EmailBlockType::Text->value,
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param value-of<SetDefaultEmailComponentsRequestSlot> $slot
     * @param SetDefaultEmailComponentsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SetDefaultEmailComponentsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function setDefault(string $slot, SetDefaultEmailComponentsRequest $request, ?array $options = null): ?SetDefaultEmailComponentsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-components/defaults/{$slot}",
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
                return SetDefaultEmailComponentsResponse::fromJson($json);
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
     * Updates component metadata or replaces its blocks. Replacing blocks bumps the component version; emails built earlier keep the copy they were created with. Editing the component pinned as the default footer keeps its unsubscribe link enabled.
     *
     * Example:
     * ```php
     * $client->emailComponents->update(
     *     'componentId',
     *     new UpdateEmailComponentsRequest([]),
     * );
     * ```
     *
     * @param string $componentId
     * @param UpdateEmailComponentsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateEmailComponentsResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function update(string $componentId, UpdateEmailComponentsRequest $request = new UpdateEmailComponentsRequest(), ?array $options = null): ?UpdateEmailComponentsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-components/{$componentId}",
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
                return UpdateEmailComponentsResponse::fromJson($json);
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
