<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Wait at least this long before looking for the window. Once it ends, the contact continues at that moment if it falls inside the window, otherwise at the next window opening, so a fixed wait and a time-of-day wait fit in one step. Omit for no minimum. Values are stored as whole days, hours and minutes, so 36 hours reads back as 1 day and 12 hours. Negative values are rejected. On create, unknown keys and non-object values are ignored and reported in warnings; node updates, inserted steps and branch paths reject them. Sequence reads always return this field, with zeros when the step has no minimum.
 */
class SequenceWaitUntilWeekdayInputMinimumWait extends JsonSerializableType
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
