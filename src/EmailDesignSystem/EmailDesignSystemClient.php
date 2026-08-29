<?php

namespace Sequenzy\EmailDesignSystem;

use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;
use Sequenzy\EmailDesignSystem\Types\GetEmailDesignSystemResponse;
use Sequenzy\Exceptions\SequenzyException;
use Sequenzy\Exceptions\SequenzyApiException;
use Sequenzy\Core\Json\JsonApiRequest;
use Sequenzy\Environments;
use Sequenzy\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Sequenzy\EmailDesignSystem\Requests\UpdateEmailDesignSystemRequest;
use Sequenzy\EmailDesignSystem\Types\UpdateEmailDesignSystemResponse;

class EmailDesignSystemClient
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
     * Returns the company's effective email design system - the visual identity every AI-generated email (campaigns and sequence steps) renders inside. The identity is stored as the company's emailDesignPrompt direction text; tokens are parsed from that text, with unstated tokens derived deterministically from brand context. isDefault is true while the identity is purely derived.
     *
     * Example:
     * ```php
     * $client->emailDesignSystem->getEmailDesignSystem();
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
     * @return ?GetEmailDesignSystemResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function getEmailDesignSystem(?array $options = null): ?GetEmailDesignSystemResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-design-system",
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
                return GetEmailDesignSystemResponse::fromJson($json);
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
     * Adjusts the company's email design system. This is a partial update - only the passed fields change - and it affects every future AI email generation and sequence enrichment. The adjustment is written into the company's emailDesignPrompt direction text (the single source of truth) - the new identity's sentences are prepended and custom prose the text carried is preserved below them. Pass reset true to clear the direction text and return to the brand-derived defaults.
     *
     * Example:
     * ```php
     * $client->emailDesignSystem->updateEmailDesignSystem(
     *     new UpdateEmailDesignSystemRequest([
     *         'compositionSpine' => UpdateEmailDesignSystemRequestCompositionSpine::Editorial->value,
     *         'designCode' => new UpdateEmailDesignSystemRequestDesignCode([
     *             'kickerStyle' => UpdateEmailDesignSystemRequestDesignCodeKickerStyle::Letterspaced->value,
     *             'openerTreatments' => [
     *                 UpdateEmailDesignSystemRequestDesignCodeOpenerTreatmentsItem::EditorialMasthead->value,
     *                 UpdateEmailDesignSystemRequestDesignCodeOpenerTreatmentsItem::TitleLed->value,
     *             ],
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param UpdateEmailDesignSystemRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateEmailDesignSystemResponse
     * @throws SequenzyException
     * @throws SequenzyApiException
     */
    public function updateEmailDesignSystem(UpdateEmailDesignSystemRequest $request = new UpdateEmailDesignSystemRequest(), ?array $options = null): ?UpdateEmailDesignSystemResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "email-design-system",
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
                return UpdateEmailDesignSystemResponse::fromJson($json);
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
