<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Shopify only: live storefront tracking pixel state, read from the store on every call. Null for providers without a pixel. Same shape as the pixel endpoint, plus healthy and dependentEvents.
 */
class IntegrationDetailPixel extends JsonSerializableType
{
    /**
     * @var ?bool $configurationCurrent
     */
    #[JsonProperty('configurationCurrent')]
    public ?bool $configurationCurrent;

    /**
     * @var ?array<string> $dependentEvents
     */
    #[JsonProperty('dependentEvents'), ArrayType(['string'])]
    public ?array $dependentEvents;

    /**
     * @var ?string $endpoint
     */
    #[JsonProperty('endpoint')]
    public ?string $endpoint;

    /**
     * @var ?bool $endpointCurrent
     */
    #[JsonProperty('endpointCurrent')]
    public ?bool $endpointCurrent;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?bool $healthy
     */
    #[JsonProperty('healthy')]
    public ?bool $healthy;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $installed
     */
    #[JsonProperty('installed')]
    public ?bool $installed;

    /**
     * @param array{
     *   configurationCurrent?: ?bool,
     *   dependentEvents?: ?array<string>,
     *   endpoint?: ?string,
     *   endpointCurrent?: ?bool,
     *   error?: ?string,
     *   healthy?: ?bool,
     *   id?: ?string,
     *   installed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->configurationCurrent = $values['configurationCurrent'] ?? null;
        $this->dependentEvents = $values['dependentEvents'] ?? null;
        $this->endpoint = $values['endpoint'] ?? null;
        $this->endpointCurrent = $values['endpointCurrent'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->healthy = $values['healthy'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->installed = $values['installed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
