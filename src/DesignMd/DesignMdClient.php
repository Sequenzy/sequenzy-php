<?php

namespace Sequenzy\DesignMd;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\DesignMd\Types\GetDesignMdResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\DesignMd\Requests\UpdateDesignMdRequest;
use Sequenzy\DesignMd\Types\UpdateDesignMdResponse;

class DesignMdClient
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
     * Returns the company's design.md, its email design brief as one Markdown document. YAML frontmatter holds the exact values AI-generated emails use (logo, colors, fonts, buttons, cornerRadius, layout tokens), shown as the values emails actually get. The body holds the Voice and Design direction sections the AI writer follows, plus a read-only Reference email section naming the saved AI style. design.md is a view over existing company fields, not a separate store.
     *
     * Example:
     * ```php
     * $client->designMd->getDesignMd();
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
     * @return ?GetDesignMdResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getDesignMd(?array $options = null): ?GetDesignMdResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "design-md",
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
                return GetDesignMdResponse::fromJson($json);
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
     * Saves an edited design.md. Only values that differ from the current document are written. A frontmatter value left exactly as returned is not written and keeps its current behavior; a changed buttons.radius, cornerRadius or fonts.heading is pinned so layout defaults no longer override it; a changed layout token is written into the design direction ahead of its prose. A key or section you remove is left unchanged, and an empty Voice or Design direction section clears that field (an empty direction returns to brand-derived defaults). Other level-2 sections are kept as part of the design direction. The Reference email section is read-only. Requires company_profile:manage, including for dry runs.
     *
     * Example:
     * ```php
     * $client->designMd->updateDesignMd(
     *     new UpdateDesignMdRequest([
     *         'expectedVersion' => '3f9a2c1d8e7b6a50',
     *         'markdown' => <<<EOT
     * ---
     * colors:
     *   primary: "#1f4fff"
     * ---
     *
     * # Acme email design
     *
     * ## Voice
     *
     * Plain and direct. Setup steps first.
     *
     * EOT,
     *     ]),
     * );
     * ```
     *
     * @param UpdateDesignMdRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateDesignMdResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateDesignMd(UpdateDesignMdRequest $request, ?array $options = null): ?UpdateDesignMdResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "design-md",
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
                return UpdateDesignMdResponse::fromJson($json);
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
