<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Named absolute moments the sequence counts down to. Delay steps with waitUntilKeyDate wait relative to one of them, so the whole countdown is re-timed by editing these dates. Changing a key date on a live sequence re-schedules contacts already waiting on it. Send null to clear.
 */
class SequenceKeyDates extends JsonSerializableType
{
    /**
     * @var array<SequenceKeyDate> $dates Sorted by time when returned.
     */
    #[JsonProperty('dates'), ArrayType([SequenceKeyDate::class])]
    public array $dates;

    /**
     * @var ?string $timezone IANA timezone the dates are shown and edited in. Required when dates is non-empty.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   dates: array<SequenceKeyDate>,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dates = $values['dates'];
        $this->timezone = $values['timezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
