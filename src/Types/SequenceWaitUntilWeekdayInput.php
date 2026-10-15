<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Hold until the next occurrence of a weekday inside a local-time window. Contacts already inside the window continue immediately, unless minimumWait is set.
 */
class SequenceWaitUntilWeekdayInput extends JsonSerializableType
{
    /**
     * @var ?string $day Single weekday convenience alias for days.
     */
    #[JsonProperty('day')]
    public ?string $day;

    /**
     * @var ?array<string> $days Weekdays the wait may release on.
     */
    #[JsonProperty('days'), ArrayType(['string'])]
    public ?array $days;

    /**
     * @var ?string $endTime Window end in 24-hour HH:mm local time. Defaults to the end-of-day boundary 24:00.
     */
    #[JsonProperty('endTime')]
    public ?string $endTime;

    /**
     * @var ?SequenceWaitUntilWeekdayInputMinimumWait $minimumWait Wait at least this long before looking for the window. Once it ends, the contact continues at that moment if it falls inside the window, otherwise at the next window opening, so a fixed wait and a time-of-day wait fit in one step. Omit for no minimum. Values are stored as whole days, hours and minutes, so 36 hours reads back as 1 day and 12 hours. Negative values are rejected. On create, unknown keys and non-object values are ignored and reported in warnings; node updates, inserted steps and branch paths reject them. Sequence reads always return this field, with zeros when the step has no minimum.
     */
    #[JsonProperty('minimumWait')]
    public ?SequenceWaitUntilWeekdayInputMinimumWait $minimumWait;

    /**
     * @var ?string $startTime Window start in 24-hour HH:mm local time.
     */
    #[JsonProperty('startTime')]
    public ?string $startTime;

    /**
     * @var ?string $timezone IANA timezone used to evaluate the window. Required. When timezoneSource is subscriber, this is the fallback for contacts without a valid timezone.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var ?value-of<SequenceWaitUntilWeekdayInputTimezoneSource> $timezoneSource fixed evaluates the window in timezone for every contact. subscriber evaluates it in each contact's own timezone (the subscriber timezone field) and falls back to timezone. The contact's timezone is read each time the step is evaluated. Sequence reads always return this field.
     */
    #[JsonProperty('timezoneSource')]
    public ?string $timezoneSource;

    /**
     * @var ?string $untilEndTime Alias for endTime.
     */
    #[JsonProperty('untilEndTime')]
    public ?string $untilEndTime;

    /**
     * @var ?string $untilStartTime Alias for startTime.
     */
    #[JsonProperty('untilStartTime')]
    public ?string $untilStartTime;

    /**
     * @var ?string $untilTimezone Alias for timezone.
     */
    #[JsonProperty('untilTimezone')]
    public ?string $untilTimezone;

    /**
     * @var ?value-of<SequenceWaitUntilWeekdayInputUntilTimezoneSource> $untilTimezoneSource Alias for timezoneSource.
     */
    #[JsonProperty('untilTimezoneSource')]
    public ?string $untilTimezoneSource;

    /**
     * @param array{
     *   day?: ?string,
     *   days?: ?array<string>,
     *   endTime?: ?string,
     *   minimumWait?: ?SequenceWaitUntilWeekdayInputMinimumWait,
     *   startTime?: ?string,
     *   timezone?: ?string,
     *   timezoneSource?: ?value-of<SequenceWaitUntilWeekdayInputTimezoneSource>,
     *   untilEndTime?: ?string,
     *   untilStartTime?: ?string,
     *   untilTimezone?: ?string,
     *   untilTimezoneSource?: ?value-of<SequenceWaitUntilWeekdayInputUntilTimezoneSource>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->day = $values['day'] ?? null;
        $this->days = $values['days'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->minimumWait = $values['minimumWait'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->timezoneSource = $values['timezoneSource'] ?? null;
        $this->untilEndTime = $values['untilEndTime'] ?? null;
        $this->untilStartTime = $values['untilStartTime'] ?? null;
        $this->untilTimezone = $values['untilTimezone'] ?? null;
        $this->untilTimezoneSource = $values['untilTimezoneSource'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
