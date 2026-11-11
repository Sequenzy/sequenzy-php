<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SequenceActionResponse;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceEffectiveStatus;
use Sequenzy\Types\SequenceStatus;

class DeleteSequencesResponse extends JsonSerializableType
{
    use SequenceActionResponse;

    /**
     * @var ?int $contactsInSequence Contacts who were still in the sequence (running a step, waiting, or paused) when it was deleted. They were removed and get none of its remaining steps.
     */
    #[JsonProperty('contactsInSequence')]
    public ?int $contactsInSequence;

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
     *   contactsInSequence?: ?int,
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
        $this->contactsInSequence = $values['contactsInSequence'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
