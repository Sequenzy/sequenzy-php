<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Attribution goal created with the sequence.
 */
class SequenceTemplateSummaryGoal extends JsonSerializableType
{
    /**
     * @var ?int $attributionWindowHours
     */
    #[JsonProperty('attributionWindowHours')]
    public ?int $attributionWindowHours;

    /**
     * @var ?string $eventName
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $valuePropertyLabel
     */
    #[JsonProperty('valuePropertyLabel')]
    public ?string $valuePropertyLabel;

    /**
     * @var ?string $valuePropertyName
     */
    #[JsonProperty('valuePropertyName')]
    public ?string $valuePropertyName;

    /**
     * @param array{
     *   attributionWindowHours?: ?int,
     *   eventName?: ?string,
     *   name?: ?string,
     *   valuePropertyLabel?: ?string,
     *   valuePropertyName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attributionWindowHours = $values['attributionWindowHours'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->valuePropertyLabel = $values['valuePropertyLabel'] ?? null;
        $this->valuePropertyName = $values['valuePropertyName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
