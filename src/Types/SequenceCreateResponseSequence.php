<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceCreateResponseSequence extends JsonSerializableType
{
    /**
     * @var ?bool $acceptsNewEnrollments Whether new subscribers can enter the sequence right now.
     */
    #[JsonProperty('acceptsNewEnrollments')]
    public ?bool $acceptsNewEnrollments;

    /**
     * @var ?float $discountCount
     */
    #[JsonProperty('discountCount')]
    public ?float $discountCount;

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
     * @var ?float $emailCount
     */
    #[JsonProperty('emailCount')]
    public ?float $emailCount;

    /**
     * @var ?string $enrichmentStatus
     */
    #[JsonProperty('enrichmentStatus')]
    public ?string $enrichmentStatus;

    /**
     * @var ?bool $enrollmentPaused Whether new enrollments are paused while current recipients continue.
     */
    #[JsonProperty('enrollmentPaused')]
    public ?bool $enrollmentPaused;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?float $nodeCount
     */
    #[JsonProperty('nodeCount')]
    public ?float $nodeCount;

    /**
     * @var ?bool $processesExistingEnrollments Whether subscribers already inside the sequence keep advancing and receiving steps.
     */
    #[JsonProperty('processesExistingEnrollments')]
    public ?bool $processesExistingEnrollments;

    /**
     * @var ?SequenceSendingWindow $sendingWindow
     */
    #[JsonProperty('sendingWindow')]
    public ?SequenceSendingWindow $sendingWindow;

    /**
     * @var ?value-of<SequenceStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?SequenceStopCondition $stopCondition
     */
    #[JsonProperty('stopCondition')]
    public ?SequenceStopCondition $stopCondition;

    /**
     * @var ?float $subscriberUpdateCount
     */
    #[JsonProperty('subscriberUpdateCount')]
    public ?float $subscriberUpdateCount;

    /**
     * @var ?string $trigger
     */
    #[JsonProperty('trigger')]
    public ?string $trigger;

    /**
     * @param array{
     *   acceptsNewEnrollments?: ?bool,
     *   discountCount?: ?float,
     *   effectiveStatus?: ?value-of<SequenceEffectiveStatus>,
     *   effectiveStatusSummary?: ?string,
     *   emailCount?: ?float,
     *   enrichmentStatus?: ?string,
     *   enrollmentPaused?: ?bool,
     *   id?: ?string,
     *   name?: ?string,
     *   nodeCount?: ?float,
     *   processesExistingEnrollments?: ?bool,
     *   sendingWindow?: ?SequenceSendingWindow,
     *   status?: ?value-of<SequenceStatus>,
     *   stopCondition?: ?SequenceStopCondition,
     *   subscriberUpdateCount?: ?float,
     *   trigger?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->acceptsNewEnrollments = $values['acceptsNewEnrollments'] ?? null;
        $this->discountCount = $values['discountCount'] ?? null;
        $this->effectiveStatus = $values['effectiveStatus'] ?? null;
        $this->effectiveStatusSummary = $values['effectiveStatusSummary'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->enrichmentStatus = $values['enrichmentStatus'] ?? null;
        $this->enrollmentPaused = $values['enrollmentPaused'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nodeCount = $values['nodeCount'] ?? null;
        $this->processesExistingEnrollments = $values['processesExistingEnrollments'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
        $this->subscriberUpdateCount = $values['subscriberUpdateCount'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
