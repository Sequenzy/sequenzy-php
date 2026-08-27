<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\IntegrationPixelStatePixel;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Live storefront tracking pixel state for a Shopify integration, read from the store on every call.
 *
 * @property ?array<string> $dependentEvents
 * @property ?string $integrationId
 * @property ?string $message
 * @property ?IntegrationPixelStatePixel $pixel
 * @property ?string $provider
 * @property ?string $shopDomain
 * @property ?bool $success
 */
trait IntegrationPixelState
{
    /**
     * @var ?array<string> $dependentEvents Event names that depend on this pixel. They are confirmed unable to arrive only when pixel.error is null and pixel.healthy is false.
     */
    #[JsonProperty('dependentEvents'), ArrayType(['string'])]
    public ?array $dependentEvents;

    /**
     * @var ?string $integrationId
     */
    #[JsonProperty('integrationId')]
    public ?string $integrationId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?IntegrationPixelStatePixel $pixel
     */
    #[JsonProperty('pixel')]
    public ?IntegrationPixelStatePixel $pixel;

    /**
     * @var ?string $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $shopDomain
     */
    #[JsonProperty('shopDomain')]
    public ?string $shopDomain;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;
}
