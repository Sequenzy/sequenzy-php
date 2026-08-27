<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Relative offset for a delay.
 */
class SequenceDelayOffsetInput extends JsonSerializableType
{
    /**
     * @var ?float $days
     */
    #[JsonProperty('days')]
    public ?float $days;

    /**
     * @var ?float $hours
     */
    #[JsonProperty('hours')]
    public ?float $hours;

    /**
     * @var ?float $minutes
     */
    #[JsonProperty('minutes')]
    public ?float $minutes;

    /**
     * @param array{
     *   days?: ?float,
     *   hours?: ?float,
     *   minutes?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->days = $values['days'] ?? null;
        $this->hours = $values['hours'] ?? null;
        $this->minutes = $values['minutes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
