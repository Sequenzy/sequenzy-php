<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\ArrayType;

class SequenceRecurringEnrollmentResponse extends JsonSerializableType
{
    /**
     * @var ?string $description Readable summary of the schedule, including the timezone.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<SequenceRecurringEnrollmentResponseEnrollmentMode> $enrollmentMode The sequence's enrollment mode, which decides who enters at each run. unlimited enrolls everyone who matches (people still inside are skipped); one_time only adds people who never entered.
     */
    #[JsonProperty('enrollmentMode')]
    public ?string $enrollmentMode;

    /**
     * @var ?string $message Present on writes.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?SequenceRecurringEnrollment $recurringEnrollment
     */
    #[JsonProperty('recurringEnrollment')]
    public ?SequenceRecurringEnrollment $recurringEnrollment;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<DateTime> $upcomingRuns The next five run times. Empty while switched off or without a schedule.
     */
    #[JsonProperty('upcomingRuns'), ArrayType(['datetime'])]
    public ?array $upcomingRuns;

    /**
     * @param array{
     *   description?: ?string,
     *   enrollmentMode?: ?value-of<SequenceRecurringEnrollmentResponseEnrollmentMode>,
     *   message?: ?string,
     *   recurringEnrollment?: ?SequenceRecurringEnrollment,
     *   success?: ?bool,
     *   upcomingRuns?: ?array<DateTime>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->enrollmentMode = $values['enrollmentMode'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->recurringEnrollment = $values['recurringEnrollment'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->upcomingRuns = $values['upcomingRuns'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
