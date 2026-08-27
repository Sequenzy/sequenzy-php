<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceCreateResponseEventTrackingPayloadContract extends JsonSerializableType
{
    /**
     * @var ?string $event
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?string $identity
     */
    #[JsonProperty('identity')]
    public ?string $identity;

    /**
     * @var ?string $properties
     */
    #[JsonProperty('properties')]
    public ?string $properties;

    /**
     * @var ?array<SequenceTriggerPropertyFilter> $propertyFilters Normalized trigger filters that the event properties must satisfy before the sequence can enroll the subscriber.
     */
    #[JsonProperty('propertyFilters'), ArrayType([SequenceTriggerPropertyFilter::class])]
    public ?array $propertyFilters;

    /**
     * @var ?array<string> $required
     */
    #[JsonProperty('required'), ArrayType(['string'])]
    public ?array $required;

    /**
     * @var ?array<string> $requiredPropertyPaths
     */
    #[JsonProperty('requiredPropertyPaths'), ArrayType(['string'])]
    public ?array $requiredPropertyPaths;

    /**
     * @param array{
     *   event?: ?string,
     *   identity?: ?string,
     *   properties?: ?string,
     *   propertyFilters?: ?array<SequenceTriggerPropertyFilter>,
     *   required?: ?array<string>,
     *   requiredPropertyPaths?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->event = $values['event'] ?? null;
        $this->identity = $values['identity'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->propertyFilters = $values['propertyFilters'] ?? null;
        $this->required = $values['required'] ?? null;
        $this->requiredPropertyPaths = $values['requiredPropertyPaths'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
