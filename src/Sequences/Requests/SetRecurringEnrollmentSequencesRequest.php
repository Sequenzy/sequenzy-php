<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceAudience;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Sequences\Types\SetRecurringEnrollmentSequencesRequestEnrollmentMode;
use Sequenzy\Types\SequenceRecurringSchedule;

class SetRecurringEnrollmentSequencesRequest extends JsonSerializableType
{
    /**
     * @var SequenceAudience $audience
     */
    #[JsonProperty('audience')]
    public SequenceAudience $audience;

    /**
     * @var ?bool $enabled Defaults to true. False keeps the schedule but stops its runs.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?DateTime $endsAt Optional. No run starts after this instant; omitted or null means no end date. Rejected when no run would happen before it.
     */
    #[JsonProperty('endsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endsAt;

    /**
     * @var ?value-of<SetRecurringEnrollmentSequencesRequestEnrollmentMode> $enrollmentMode Optional. Sets the sequence's enrollment mode in the same save. unlimited re-enrolls everyone who matches at each run; one_time only adds people who never entered. This mode also applies to enrollments started by hand. Omit to keep the current mode.
     */
    #[JsonProperty('enrollmentMode')]
    public ?string $enrollmentMode;

    /**
     * @var SequenceRecurringSchedule $schedule
     */
    #[JsonProperty('schedule')]
    public SequenceRecurringSchedule $schedule;

    /**
     * @param array{
     *   audience: SequenceAudience,
     *   schedule: SequenceRecurringSchedule,
     *   enabled?: ?bool,
     *   endsAt?: ?DateTime,
     *   enrollmentMode?: ?value-of<SetRecurringEnrollmentSequencesRequestEnrollmentMode>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'];
        $this->enabled = $values['enabled'] ?? null;
        $this->endsAt = $values['endsAt'] ?? null;
        $this->enrollmentMode = $values['enrollmentMode'] ?? null;
        $this->schedule = $values['schedule'];
    }
}
