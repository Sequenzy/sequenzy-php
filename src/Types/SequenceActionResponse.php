<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceActionResponse extends JsonSerializableType
{
    /**
     * @var ?bool $acceptsNewEnrollments Whether new subscribers can enter the sequence right now.
     */
    #[JsonProperty('acceptsNewEnrollments')]
    public ?bool $acceptsNewEnrollments;

    /**
     * @var ?value-of<SequenceEffectiveStatus> $effectiveStatus
     */
    #[JsonProperty('effectiveStatus')]
    public ?string $effectiveStatus;

    /**
     * @var ?string $effectiveStatusSummary One plain-language sentence describing the run state, safe to show a user verbatim.
     */
    #[JsonProperty('effectiveStatusSummary')]
    public ?string $effectiveStatusSummary;

    /**
     * @var ?bool $enrollmentPaused Present for enable/disable and enrollment pause/resume actions.
     */
    #[JsonProperty('enrollmentPaused')]
    public ?bool $enrollmentPaused;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $processesExistingEnrollments Whether subscribers already inside the sequence keep advancing and receiving steps.
     */
    #[JsonProperty('processesExistingEnrollments')]
    public ?bool $processesExistingEnrollments;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?value-of<SequenceStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings Enable only. Non-blocking readiness warnings, such as empty branch paths or a `contact_added` trigger with no list, which enrolls every contact added to the company. Absent when there is nothing to report.
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   acceptsNewEnrollments?: ?bool,
     *   effectiveStatus?: ?value-of<SequenceEffectiveStatus>,
     *   effectiveStatusSummary?: ?string,
     *   enrollmentPaused?: ?bool,
     *   message?: ?string,
     *   processesExistingEnrollments?: ?bool,
     *   sequenceId?: ?string,
     *   status?: ?value-of<SequenceStatus>,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->acceptsNewEnrollments = $values['acceptsNewEnrollments'] ?? null;
        $this->effectiveStatus = $values['effectiveStatus'] ?? null;
        $this->effectiveStatusSummary = $values['effectiveStatusSummary'] ?? null;
        $this->enrollmentPaused = $values['enrollmentPaused'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->processesExistingEnrollments = $values['processesExistingEnrollments'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
