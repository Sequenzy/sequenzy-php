<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Hold until the next occurrence of a weekday inside a local-time window. Contacts already inside the window continue immediately.
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
     * @var ?string $startTime Window start in 24-hour HH:mm local time.
     */
    #[JsonProperty('startTime')]
    public ?string $startTime;

    /**
     * @var ?string $timezone IANA timezone used to evaluate the window.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

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
     * @param array{
     *   day?: ?string,
     *   days?: ?array<string>,
     *   endTime?: ?string,
     *   startTime?: ?string,
     *   timezone?: ?string,
     *   untilEndTime?: ?string,
     *   untilStartTime?: ?string,
     *   untilTimezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->day = $values['day'] ?? null;
        $this->days = $values['days'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->untilEndTime = $values['untilEndTime'] ?? null;
        $this->untilStartTime = $values['untilStartTime'] ?? null;
        $this->untilTimezone = $values['untilTimezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
