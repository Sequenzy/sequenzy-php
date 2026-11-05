<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Core\Types\Union;

/**
 * When a recurring sequence runs. Times are read in `timezone`, so runs stay at the same local time across daylight saving changes.
 */
class SequenceRecurringSchedule extends JsonSerializableType
{
    /**
     * @var value-of<SequenceRecurringScheduleFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public string $frequency;

    /**
     * @var ?array<(
     *    int
     *   |value-of<SequenceRecurringScheduleMonthDaysItemOne>
     * )> $monthDays Required for monthly, ignored otherwise. Days 1 to 31 and/or "last" for the last day of the month. A day past the end of a shorter month runs on its last day (the 31st runs on February 28 or 29). Stored sorted with "last" at the end; empty for other frequencies.
     */
    #[JsonProperty('monthDays'), ArrayType([new Union('integer', 'string')])]
    public ?array $monthDays;

    /**
     * @var string $time 24-hour wall-clock time. A time skipped by a daylight saving change runs just after the gap.
     */
    #[JsonProperty('time')]
    public string $time;

    /**
     * @var string $timezone IANA timezone such as Europe/London or UTC. Offsets like +02:00 are rejected.
     */
    #[JsonProperty('timezone')]
    public string $timezone;

    /**
     * @var ?array<int> $weekdays Required for weekly, ignored otherwise. 0 is Sunday and 6 is Saturday; [1, 2, 3, 4, 5] is every weekday. Stored sorted and without duplicates; empty for other frequencies.
     */
    #[JsonProperty('weekdays'), ArrayType(['integer'])]
    public ?array $weekdays;

    /**
     * @param array{
     *   frequency: value-of<SequenceRecurringScheduleFrequency>,
     *   time: string,
     *   timezone: string,
     *   monthDays?: ?array<(
     *    int
     *   |value-of<SequenceRecurringScheduleMonthDaysItemOne>
     * )>,
     *   weekdays?: ?array<int>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->frequency = $values['frequency'];
        $this->monthDays = $values['monthDays'] ?? null;
        $this->time = $values['time'];
        $this->timezone = $values['timezone'];
        $this->weekdays = $values['weekdays'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
