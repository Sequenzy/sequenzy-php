<?php

namespace Sequenzy\Media;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\Media\Requests\CompleteEmailImageUploadRequest;
use Sequenzy\Media\Types\CompleteEmailImageUploadResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\Media\Requests\CreateEmailImageUploadUrlRequest;
use Sequenzy\Media\Types\CreateEmailImageUploadUrlResponse;
use Sequenzy\Media\Requests\UploadEmailImageBytesRequest;
use Sequenzy\Media\Types\UploadEmailImageBytesResponse;

class MediaClient
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
     * Idempotently registers a completed company-scoped image upload in the shared media library and returns its hosted URL.
     *
     * Example:
     * ```php
     * $client->media->completeEmailImageUpload(
     *     new CompleteEmailImageUploadRequest([
     *         'altText' => 'altText',
     *         'contentType' => 'image/png',
     *         'filename' => 'filename',
     *         'fileSizeBytes' => 1,
     *         'key' => 'key',
     *     ]),
     * );
     * ```
     *
     * @param CompleteEmailImageUploadRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CompleteEmailImageUploadResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function completeEmailImageUpload(CompleteEmailImageUploadRequest $request, ?array $options = null): ?CompleteEmailImageUploadResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "media/complete-upload",
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
                return CompleteEmailImageUploadResponse::fromJson($json);
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
     * Returns an authenticated API URL for a block-ready email image. PUT the exact bytes to uploadUrl using the same API credentials, then register the key with POST /media/complete-upload. The public object does not exist until its bytes pass server-side validation.
     *
     * Example:
     * ```php
     * $client->media->createEmailImageUploadUrl(
     *     new CreateEmailImageUploadUrlRequest([
     *         'contentType' => 'image/png',
     *         'filename' => 'filename',
     *         'fileSizeBytes' => 1,
     *     ]),
     * );
     * ```
     *
     * @param CreateEmailImageUploadUrlRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateEmailImageUploadUrlResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function createEmailImageUploadUrl(CreateEmailImageUploadUrlRequest $request, ?array $options = null): ?CreateEmailImageUploadUrlResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "media/upload-url",
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
                return CreateEmailImageUploadUrlResponse::fromJson($json);
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
     * Uploads the exact bytes to the authenticated URL returned by POST /media/upload-url. The server enforces the requested size, verifies the file signature, and creates the public object only once.
     *
     * @param UploadEmailImageBytesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UploadEmailImageBytesResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function uploadEmailImageBytes(UploadEmailImageBytesRequest $request, ?array $options = null): ?UploadEmailImageBytesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['contentType'] = $request->contentType;
        $query['filename'] = $request->filename;
        $query['fileSizeBytes'] = $request->fileSizeBytes;
        $query['key'] = $request->key;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "media/upload-bytes",
                    method: HttpMethod::PUT,
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
                return UploadEmailImageBytesResponse::fromJson($json);
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
