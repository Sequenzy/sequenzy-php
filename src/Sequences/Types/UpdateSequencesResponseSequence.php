<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\SequenceSendingWindow;
use Sequenzy\Types\SequenceStatus;
use Sequenzy\Types\SequenceStopCondition;

class UpdateSequencesResponseSequence extends JsonSerializableType
{
    /**
     * @var ?string $addedBranchNodeId
     */
    #[JsonProperty('addedBranchNodeId')]
    public ?string $addedBranchNodeId;

    /**
     * @var ?array<string, array<string>> $addedBranchPathNodeIds Created node IDs per branch path, in path order. Directly wired paths are empty arrays. A path's steps are one linear chain, so to nest another branch on a path, send a second update whose branch.afterNodeId is that path's last node ID; the nested paths reconnect to whatever already followed it.
     */
    #[JsonProperty('addedBranchPathNodeIds'), ArrayType(['string' => ['string']])]
    public ?array $addedBranchPathNodeIds;

    /**
     * @var ?array<string> $bccEmails
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?float $completedRecipientCount Recipients completed because their deleted step had no next step.
     */
    #[JsonProperty('completedRecipientCount')]
    public ?float $completedRecipientCount;

    /**
     * @var ?string $deletedNodeId Node deleted by a delete_node edit.
     */
    #[JsonProperty('deletedNodeId')]
    public ?string $deletedNodeId;

    /**
     * @var ?string $duplicatedNodeId New node created by a duplicate_node edit.
     */
    #[JsonProperty('duplicatedNodeId')]
    public ?string $duplicatedNodeId;

    /**
     * @var ?bool $enrollmentPaused
     */
    #[JsonProperty('enrollmentPaused')]
    public ?bool $enrollmentPaused;

    /**
     * @var ?value-of<UpdateSequencesResponseSequenceGraphEditAction> $graphEditAction
     */
    #[JsonProperty('graphEditAction')]
    public ?string $graphEditAction;

    /**
     * @var ?string $graphRevision Revision of the committed graph. Use it for the next graphEdit.expectedRevision.
     */
    #[JsonProperty('graphRevision')]
    public ?string $graphRevision;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?float $insertedEmailCount
     */
    #[JsonProperty('insertedEmailCount')]
    public ?float $insertedEmailCount;

    /**
     * @var ?array<string> $insertedEmailIds
     */
    #[JsonProperty('insertedEmailIds'), ArrayType(['string'])]
    public ?array $insertedEmailIds;

    /**
     * @var ?array<string> $insertedNodeIds
     */
    #[JsonProperty('insertedNodeIds'), ArrayType(['string'])]
    public ?array $insertedNodeIds;

    /**
     * @var ?float $migratedRecipientCount Recipients moved off deleted steps to the next step and processed immediately.
     */
    #[JsonProperty('migratedRecipientCount')]
    public ?float $migratedRecipientCount;

    /**
     * @var ?string $movedNodeId Node moved by a move_node edit.
     */
    #[JsonProperty('movedNodeId')]
    public ?string $movedNodeId;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?float $replacedEdgeCount Number of edges in the committed graph after a structural graph edit.
     */
    #[JsonProperty('replacedEdgeCount')]
    public ?float $replacedEdgeCount;

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
     * @var ?float $updatedEmailCount
     */
    #[JsonProperty('updatedEmailCount')]
    public ?float $updatedEmailCount;

    /**
     * @var ?float $updatedSmsStepCount
     */
    #[JsonProperty('updatedSmsStepCount')]
    public ?float $updatedSmsStepCount;

    /**
     * @var ?float $updatedSubscriberStepCount
     */
    #[JsonProperty('updatedSubscriberStepCount')]
    public ?float $updatedSubscriberStepCount;

    /**
     * @param array{
     *   addedBranchNodeId?: ?string,
     *   addedBranchPathNodeIds?: ?array<string, array<string>>,
     *   bccEmails?: ?array<string>,
     *   completedRecipientCount?: ?float,
     *   deletedNodeId?: ?string,
     *   duplicatedNodeId?: ?string,
     *   enrollmentPaused?: ?bool,
     *   graphEditAction?: ?value-of<UpdateSequencesResponseSequenceGraphEditAction>,
     *   graphRevision?: ?string,
     *   id?: ?string,
     *   insertedEmailCount?: ?float,
     *   insertedEmailIds?: ?array<string>,
     *   insertedNodeIds?: ?array<string>,
     *   migratedRecipientCount?: ?float,
     *   movedNodeId?: ?string,
     *   name?: ?string,
     *   replacedEdgeCount?: ?float,
     *   sendingWindow?: ?SequenceSendingWindow,
     *   status?: ?value-of<SequenceStatus>,
     *   stopCondition?: ?SequenceStopCondition,
     *   updatedEmailCount?: ?float,
     *   updatedSmsStepCount?: ?float,
     *   updatedSubscriberStepCount?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addedBranchNodeId = $values['addedBranchNodeId'] ?? null;
        $this->addedBranchPathNodeIds = $values['addedBranchPathNodeIds'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->completedRecipientCount = $values['completedRecipientCount'] ?? null;
        $this->deletedNodeId = $values['deletedNodeId'] ?? null;
        $this->duplicatedNodeId = $values['duplicatedNodeId'] ?? null;
        $this->enrollmentPaused = $values['enrollmentPaused'] ?? null;
        $this->graphEditAction = $values['graphEditAction'] ?? null;
        $this->graphRevision = $values['graphRevision'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->insertedEmailCount = $values['insertedEmailCount'] ?? null;
        $this->insertedEmailIds = $values['insertedEmailIds'] ?? null;
        $this->insertedNodeIds = $values['insertedNodeIds'] ?? null;
        $this->migratedRecipientCount = $values['migratedRecipientCount'] ?? null;
        $this->movedNodeId = $values['movedNodeId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->replacedEdgeCount = $values['replacedEdgeCount'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
        $this->updatedEmailCount = $values['updatedEmailCount'] ?? null;
        $this->updatedSmsStepCount = $values['updatedSmsStepCount'] ?? null;
        $this->updatedSubscriberStepCount = $values['updatedSubscriberStepCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
