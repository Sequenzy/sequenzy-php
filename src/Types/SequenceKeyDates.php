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
     * @var ?SequenceKeyDatesSendWindow $sendWindow How sends timed from these moments are spread out, so a whole audience is not emailed in the same second. Each contact gets their own stable send time within the spread, after the moment for steps at or after it and in the hours leading up to the step's time for steps timed before it, so a "1 hour before Black Friday ends" email never lands after the sale ended. Omit it on update to keep the current spread, and send null to reset it to the default. Responses always include the effective value.
     */
    #[JsonProperty('sendWindow')]
    public ?SequenceKeyDatesSendWindow $sendWindow;

    /**
     * @var ?string $timezone IANA timezone the dates are shown and edited in. Required when dates is non-empty.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   dates: array<SequenceKeyDate>,
     *   sendWindow?: ?SequenceKeyDatesSendWindow,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dates = $values['dates'];
        $this->sendWindow = $values['sendWindow'] ?? null;
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
