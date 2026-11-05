<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * A schedule that re-enrolls an audience into a manual-trigger sequence. Each run is an audience enrollment run with source `recurring`.
 */
class SequenceRecurringEnrollment extends JsonSerializableType
{
    /**
     * @var ?SequenceAudience $audience
     */
    #[JsonProperty('audience')]
    public ?SequenceAudience $audience;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?DateTime $enabledAt When the schedule was last switched on or changed.
     */
    #[JsonProperty('enabledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $enabledAt;

    /**
     * @var ?DateTime $endsAt No run starts after this instant. Null repeats until switched off. Once nothing is left before it, nextRunAt is null while enabled stays true.
     */
    #[JsonProperty('endsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endsAt;

    /**
     * @var ?DateTime $lastRunAt Occurrence of the most recent run that started.
     */
    #[JsonProperty('lastRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastRunAt;

    /**
     * @var ?string $lastRunId Audience enrollment run started for lastRunAt.
     */
    #[JsonProperty('lastRunId')]
    public ?string $lastRunId;

    /**
     * @var ?DateTime $lastSkippedAt Occurrence of the most recent skipped run.
     */
    #[JsonProperty('lastSkippedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSkippedAt;

    /**
     * @var ?value-of<SequenceRecurringEnrollmentLastSkipReason> $lastSkipReason not_accepting when the sequence was paused, disabled or closed to new entrants; missed when the run could not start within 6 hours of its time.
     */
    #[JsonProperty('lastSkipReason')]
    public ?string $lastSkipReason;

    /**
     * @var ?DateTime $nextRunAt Next occurrence. Null while switched off.
     */
    #[JsonProperty('nextRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRunAt;

    /**
     * @var ?SequenceRecurringSchedule $schedule
     */
    #[JsonProperty('schedule')]
    public ?SequenceRecurringSchedule $schedule;

    /**
     * @param array{
     *   audience?: ?SequenceAudience,
     *   enabled?: ?bool,
     *   enabledAt?: ?DateTime,
     *   endsAt?: ?DateTime,
     *   lastRunAt?: ?DateTime,
     *   lastRunId?: ?string,
     *   lastSkippedAt?: ?DateTime,
     *   lastSkipReason?: ?value-of<SequenceRecurringEnrollmentLastSkipReason>,
     *   nextRunAt?: ?DateTime,
     *   schedule?: ?SequenceRecurringSchedule,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audience = $values['audience'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->enabledAt = $values['enabledAt'] ?? null;
        $this->endsAt = $values['endsAt'] ?? null;
        $this->lastRunAt = $values['lastRunAt'] ?? null;
        $this->lastRunId = $values['lastRunId'] ?? null;
        $this->lastSkippedAt = $values['lastSkippedAt'] ?? null;
        $this->lastSkipReason = $values['lastSkipReason'] ?? null;
        $this->nextRunAt = $values['nextRunAt'] ?? null;
        $this->schedule = $values['schedule'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
