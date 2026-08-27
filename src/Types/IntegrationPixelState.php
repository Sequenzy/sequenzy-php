<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Live storefront tracking pixel state for a Shopify integration, read from the store on every call.
 */
class IntegrationPixelState extends JsonSerializableType
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

    /**
     * @param array{
     *   dependentEvents?: ?array<string>,
     *   integrationId?: ?string,
     *   message?: ?string,
     *   pixel?: ?IntegrationPixelStatePixel,
     *   provider?: ?string,
     *   shopDomain?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dependentEvents = $values['dependentEvents'] ?? null;
        $this->integrationId = $values['integrationId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->pixel = $values['pixel'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->shopDomain = $values['shopDomain'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
