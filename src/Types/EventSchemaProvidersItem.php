<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EventSchemaProvidersItem extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $examplePayload A representative sample payload, not a contract.
     */
    #[JsonProperty('examplePayload'), ArrayType(['string' => 'mixed'])]
    public ?array $examplePayload;

    /**
     * @var ?array<EventSchemaProvidersItemPropertiesItem> $properties
     */
    #[JsonProperty('properties'), ArrayType([EventSchemaProvidersItemPropertiesItem::class])]
    public ?array $properties;

    /**
     * @var ?value-of<EventSchemaProvidersItemProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @param array{
     *   examplePayload?: ?array<string, mixed>,
     *   properties?: ?array<EventSchemaProvidersItemPropertiesItem>,
     *   provider?: ?value-of<EventSchemaProvidersItemProvider>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->examplePayload = $values['examplePayload'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->provider = $values['provider'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
