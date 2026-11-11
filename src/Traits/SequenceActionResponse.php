<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\SequenceEffectiveStatus;
use Sequenzy\Types\SequenceStatus;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property ?bool $acceptsNewEnrollments
 * @property ?value-of<SequenceEffectiveStatus> $effectiveStatus
 * @property ?string $effectiveStatusSummary
 * @property ?bool $enrollmentPaused
 * @property ?string $message
 * @property ?bool $processesExistingEnrollments
 * @property ?string $sequenceId
 * @property ?value-of<SequenceStatus> $status
 * @property ?bool $success
 * @property ?array<string> $warnings
 */
trait SequenceActionResponse
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
     * @var ?array<string> $warnings Enable only. Non-blocking readiness warnings, such as empty branch paths, a `contact_added` trigger with no list, which enrolls every contact added to the company, or an email that uses `{{webhooks.KEY...}}` or `{{ai.KEY...}}` when no earlier step saves a result under that key, so those tags send empty. Absent when there is nothing to report.
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;
}
