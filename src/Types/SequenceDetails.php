<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SequenceSummary;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;

class SequenceDetails extends JsonSerializableType
{
    use SequenceSummary;

    /**
     * @var ?float $abTestCount How many of the email steps are A/B test steps.
     */
    #[JsonProperty('abTestCount')]
    public ?float $abTestCount;

    /**
     * @var ?float $discountCount
     */
    #[JsonProperty('discountCount')]
    public ?float $discountCount;

    /**
     * @var ?array<SequenceGraphEdgeInput> $edges Editable sequence topology. Pass the complete set back to graphEdit.edges when replacing edges.
     */
    #[JsonProperty('edges'), ArrayType([SequenceGraphEdgeInput::class])]
    public ?array $edges;

    /**
     * @var ?float $emailCount Number of email-sending steps, including action_ab_test steps.
     */
    #[JsonProperty('emailCount')]
    public ?float $emailCount;

    /**
     * @var ?array<SequenceEmail> $emails
     */
    #[JsonProperty('emails'), ArrayType([SequenceEmail::class])]
    public ?array $emails;

    /**
     * @var ?float $enrichedCount
     */
    #[JsonProperty('enrichedCount')]
    public ?float $enrichedCount;

    /**
     * @var ?value-of<SequenceDetailsEnrichmentStatus> $enrichmentStatus
     */
    #[JsonProperty('enrichmentStatus')]
    public ?string $enrichmentStatus;

    /**
     * @var ?string $graphRevision Revision token for optimistic graph edits. Supply this as graphEdit.expectedRevision.
     */
    #[JsonProperty('graphRevision')]
    public ?string $graphRevision;

    /**
     * @var ?array<SequenceNode> $nodes
     */
    #[JsonProperty('nodes'), ArrayType([SequenceNode::class])]
    public ?array $nodes;

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
     * @param array{
     *   acceptsNewEnrollments?: ?bool,
     *   bccEmails?: ?array<string>,
     *   createdAt?: ?DateTime,
     *   description?: ?string,
     *   effectiveStatus?: ?value-of<SequenceEffectiveStatus>,
     *   effectiveStatusSummary?: ?string,
     *   enrollmentPaused?: ?bool,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   id?: ?string,
     *   labelIds?: ?array<string>,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   pausedAt?: ?DateTime,
     *   pausedByUser?: ?SequenceSummaryPausedByUser,
     *   pausedByUserId?: ?string,
     *   pauseReason?: ?string,
     *   pauseSource?: ?string,
     *   processesExistingEnrollments?: ?bool,
     *   replyProfileId?: ?string,
     *   replyToEmail?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   sendingWindow?: ?SequenceSendingWindow,
     *   status?: ?value-of<SequenceStatus>,
     *   trigger?: ?string,
     *   triggerConfig?: ?array<string, mixed>,
     *   updatedAt?: ?DateTime,
     *   userCancellable?: ?bool,
     *   abTestCount?: ?float,
     *   discountCount?: ?float,
     *   edges?: ?array<SequenceGraphEdgeInput>,
     *   emailCount?: ?float,
     *   emails?: ?array<SequenceEmail>,
     *   enrichedCount?: ?float,
     *   enrichmentStatus?: ?value-of<SequenceDetailsEnrichmentStatus>,
     *   graphRevision?: ?string,
     *   nodes?: ?array<SequenceNode>,
     *   stopCondition?: ?SequenceStopCondition,
     *   subscriberUpdateCount?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->acceptsNewEnrollments = $values['acceptsNewEnrollments'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->effectiveStatus = $values['effectiveStatus'] ?? null;
        $this->effectiveStatusSummary = $values['effectiveStatusSummary'] ?? null;
        $this->enrollmentPaused = $values['enrollmentPaused'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labelIds = $values['labelIds'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->pausedAt = $values['pausedAt'] ?? null;
        $this->pausedByUser = $values['pausedByUser'] ?? null;
        $this->pausedByUserId = $values['pausedByUserId'] ?? null;
        $this->pauseReason = $values['pauseReason'] ?? null;
        $this->pauseSource = $values['pauseSource'] ?? null;
        $this->processesExistingEnrollments = $values['processesExistingEnrollments'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyToEmail = $values['replyToEmail'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->triggerConfig = $values['triggerConfig'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->userCancellable = $values['userCancellable'] ?? null;
        $this->abTestCount = $values['abTestCount'] ?? null;
        $this->discountCount = $values['discountCount'] ?? null;
        $this->edges = $values['edges'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->emails = $values['emails'] ?? null;
        $this->enrichedCount = $values['enrichedCount'] ?? null;
        $this->enrichmentStatus = $values['enrichmentStatus'] ?? null;
        $this->graphRevision = $values['graphRevision'] ?? null;
        $this->nodes = $values['nodes'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
        $this->subscriberUpdateCount = $values['subscriberUpdateCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
