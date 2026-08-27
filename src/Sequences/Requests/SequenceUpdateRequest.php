<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\SequenceBranchInput;
use Sequenzy\Types\SequenceEmailUpdateInput;
use Sequenzy\Types\SequenceEnrollmentMode;
use Sequenzy\Types\SequenceGraphEditInput;
use Sequenzy\Sequences\Types\SequenceUpdateRequestInactivityBaseline;
use Sequenzy\Types\SequenceLinearStepInsertionInput;
use Sequenzy\Sequences\Types\SequenceUpdateRequestListScope;
use Sequenzy\Types\SequenceNodeUpdateInput;
use Sequenzy\Types\SequenceTriggerPropertyFilter;
use Sequenzy\Types\SequenceSendingWindow;
use Sequenzy\Types\SequenceSmsStepUpdateInput;
use Sequenzy\Types\SequenceStopCondition;
use Sequenzy\Types\SequenceSubscriberUpdateStepUpdateInput;
use Sequenzy\Types\SequenceTriggerType;

class SequenceUpdateRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $bccEmails Email addresses that receive a blind copy of every email this sequence sends, such as a customer support inbox (max 10). Set to null to remove them.
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?SequenceBranchInput $branch
     */
    #[JsonProperty('branch')]
    public ?SequenceBranchInput $branch;

    /**
     * @var ?bool $confirmLiveChange Required for trigger replacement or nodeUpdates on an active sequence. Set true only after confirming that the edits can affect recipients who reach those nodes in the future.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

    /**
     * @var ?bool $confirmStructuralChange Required when inserting steps or branches, or editing the graph of an active sequence. Set true only after confirming the live-flow impact for current and future recipients.
     */
    #[JsonProperty('confirmStructuralChange')]
    public ?bool $confirmStructuralChange;

    /**
     * @var ?array<string, mixed> $customIntegration Custom integration descriptor for an inbound_webhook trigger.
     */
    #[JsonProperty('customIntegration'), ArrayType(['string' => 'mixed'])]
    public ?array $customIntegration;

    /**
     * @var ?string $description Updated dashboard description.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<SequenceEmailUpdateInput> $emails Existing email step updates. Provide either emails or steps. Items without nodeId or emailId are matched by existing step order and do not create new steps.
     */
    #[JsonProperty('emails'), ArrayType([SequenceEmailUpdateInput::class])]
    public ?array $emails;

    /**
     * @var ?string $enrollmentFieldPath Scalar dot-path event property used by matching_field enrollment on event_received and inbound_webhook sequences. Array traversal with [] is not supported; use propertyFilters for array matching. Set to null to use built-in defaults.
     */
    #[JsonProperty('enrollmentFieldPath')]
    public ?string $enrollmentFieldPath;

    /**
     * @var ?value-of<SequenceEnrollmentMode> $enrollmentMode
     */
    #[JsonProperty('enrollmentMode')]
    public ?string $enrollmentMode;

    /**
     * @var ?bool $enrollmentPaused Set true to stop new enrollments for an active sequence while current recipients continue. Set false to resume new enrollments.
     */
    #[JsonProperty('enrollmentPaused')]
    public ?bool $enrollmentPaused;

    /**
     * @var ?string $eventName Event name for event_received, inbound_webhook, inactivity, or frequency triggers.
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?string $fromEmail From address for every email in this sequence. Its domain must be configured and verified.
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName Display name recipients see, e.g. 'Brennon at TradeTally'. Selects the sender identity of that name on fromEmail, creating it when the address has no identity by that name; the mailbox's other display names, and everything pinned to them, are untouched. Requires fromEmail; omit it when using senderProfileId, which already carries its own display name.
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?SequenceGraphEditInput $graphEdit
     */
    #[JsonProperty('graphEdit')]
    public ?SequenceGraphEditInput $graphEdit;

    /**
     * @var ?float $inactiveDays
     */
    #[JsonProperty('inactiveDays')]
    public ?float $inactiveDays;

    /**
     * @var ?value-of<SequenceUpdateRequestInactivityBaseline> $inactivityBaseline
     */
    #[JsonProperty('inactivityBaseline')]
    public ?string $inactivityBaseline;

    /**
     * @var ?SequenceLinearStepInsertionInput $insertSteps
     */
    #[JsonProperty('insertSteps')]
    public ?SequenceLinearStepInsertionInput $insertSteps;

    /**
     * @var ?string $integrationEventKey Catalog event key for an inbound_webhook trigger.
     */
    #[JsonProperty('integrationEventKey')]
    public ?string $integrationEventKey;

    /**
     * @var ?string $integrationSlug Catalog integration slug for an inbound_webhook trigger.
     */
    #[JsonProperty('integrationSlug')]
    public ?string $integrationSlug;

    /**
     * @var ?array<string> $labels Replacement dashboard label names. Missing labels are created.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $listId List ID for a replacement contact_added trigger.
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?array<string> $listIds Several list IDs for a replacement contact_added trigger. A contact joining ANY of them enrolls. Cannot be combined with listScope.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?value-of<SequenceUpdateRequestListScope> $listScope For a replacement contact_added trigger with no list. `any_contact` (the default) enrolls every contact added, even one that joins no list; `any_list` waits for a list membership. Cannot be combined with listId or listIds.
     */
    #[JsonProperty('listScope')]
    public ?string $listScope;

    /**
     * @var ?float $minCount
     */
    #[JsonProperty('minCount')]
    public ?float $minCount;

    /**
     * @var ?string $name Updated sequence name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<SequenceNodeUpdateInput> $nodeUpdates Atomic, type-aware patches for existing sequence nodes. A node may appear only once, and either every patch commits or none do.
     */
    #[JsonProperty('nodeUpdates'), ArrayType([SequenceNodeUpdateInput::class])]
    public ?array $nodeUpdates;

    /**
     * @var ?array<SequenceTriggerPropertyFilter> $propertyFilters
     */
    #[JsonProperty('propertyFilters'), ArrayType([SequenceTriggerPropertyFilter::class])]
    public ?array $propertyFilters;

    /**
     * @var ?string $replyProfileId Existing reply profile ID. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Reply-To address for every email in this sequence.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $segmentId Segment ID for a replacement segment_entered trigger.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var ?string $senderProfileId Existing sender profile ID. It already supplies both the From address and display name, so send it on its own and omit fromEmail and fromName. To keep this profile under a different display name, set fromName on the email steps instead, where it is a per-step override.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?SequenceSendingWindow $sendingWindow
     */
    #[JsonProperty('sendingWindow')]
    public ?SequenceSendingWindow $sendingWindow;

    /**
     * @var ?array<SequenceSmsStepUpdateInput> $smsSteps Content updates for existing SMS steps, targeted by action_sms nodeId. Content-only edits; use insertSteps to create new SMS steps.
     */
    #[JsonProperty('smsSteps'), ArrayType([SequenceSmsStepUpdateInput::class])]
    public ?array $smsSteps;

    /**
     * @var ?array<SequenceEmailUpdateInput> $steps Alias for emails. Use insertSteps to create new steps.
     */
    #[JsonProperty('steps'), ArrayType([SequenceEmailUpdateInput::class])]
    public ?array $steps;

    /**
     * @var ?SequenceStopCondition $stopCondition
     */
    #[JsonProperty('stopCondition')]
    public ?SequenceStopCondition $stopCondition;

    /**
     * @var ?bool $stopOnSegmentExit Stop active enrollments when a contact leaves the replacement trigger segment.
     */
    #[JsonProperty('stopOnSegmentExit')]
    public ?bool $stopOnSegmentExit;

    /**
     * @var ?array<SequenceSubscriberUpdateStepUpdateInput> $subscriberUpdateSteps Full config replacements for existing action_update_attributes steps, targeted by nodeId.
     */
    #[JsonProperty('subscriberUpdateSteps'), ArrayType([SequenceSubscriberUpdateStepUpdateInput::class])]
    public ?array $subscriberUpdateSteps;

    /**
     * @var ?string $tagName Tag name for a replacement tag_added trigger.
     */
    #[JsonProperty('tagName')]
    public ?string $tagName;

    /**
     * @var ?array<string> $tagNames Several tag names for a replacement tag_added trigger. Receiving ANY of them enrolls the contact.
     */
    #[JsonProperty('tagNames'), ArrayType(['string'])]
    public ?array $tagNames;

    /**
     * @var ?float $timeWindowDays
     */
    #[JsonProperty('timeWindowDays')]
    public ?float $timeWindowDays;

    /**
     * @var ?value-of<SequenceTriggerType> $trigger Atomically replaces the current trigger. Include its typed configuration fields in the same request. Active sequences require confirmLiveChange.
     */
    #[JsonProperty('trigger')]
    public ?string $trigger;

    /**
     * @var ?bool $userCancellable Whether recipients can cancel this sequence from email preferences.
     */
    #[JsonProperty('userCancellable')]
    public ?bool $userCancellable;

    /**
     * @param array{
     *   bccEmails?: ?array<string>,
     *   branch?: ?SequenceBranchInput,
     *   confirmLiveChange?: ?bool,
     *   confirmStructuralChange?: ?bool,
     *   customIntegration?: ?array<string, mixed>,
     *   description?: ?string,
     *   emails?: ?array<SequenceEmailUpdateInput>,
     *   enrollmentFieldPath?: ?string,
     *   enrollmentMode?: ?value-of<SequenceEnrollmentMode>,
     *   enrollmentPaused?: ?bool,
     *   eventName?: ?string,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   graphEdit?: ?SequenceGraphEditInput,
     *   inactiveDays?: ?float,
     *   inactivityBaseline?: ?value-of<SequenceUpdateRequestInactivityBaseline>,
     *   insertSteps?: ?SequenceLinearStepInsertionInput,
     *   integrationEventKey?: ?string,
     *   integrationSlug?: ?string,
     *   labels?: ?array<string>,
     *   listId?: ?string,
     *   listIds?: ?array<string>,
     *   listScope?: ?value-of<SequenceUpdateRequestListScope>,
     *   minCount?: ?float,
     *   name?: ?string,
     *   nodeUpdates?: ?array<SequenceNodeUpdateInput>,
     *   propertyFilters?: ?array<SequenceTriggerPropertyFilter>,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   segmentId?: ?string,
     *   senderProfileId?: ?string,
     *   sendingWindow?: ?SequenceSendingWindow,
     *   smsSteps?: ?array<SequenceSmsStepUpdateInput>,
     *   steps?: ?array<SequenceEmailUpdateInput>,
     *   stopCondition?: ?SequenceStopCondition,
     *   stopOnSegmentExit?: ?bool,
     *   subscriberUpdateSteps?: ?array<SequenceSubscriberUpdateStepUpdateInput>,
     *   tagName?: ?string,
     *   tagNames?: ?array<string>,
     *   timeWindowDays?: ?float,
     *   trigger?: ?value-of<SequenceTriggerType>,
     *   userCancellable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->branch = $values['branch'] ?? null;
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->confirmStructuralChange = $values['confirmStructuralChange'] ?? null;
        $this->customIntegration = $values['customIntegration'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->emails = $values['emails'] ?? null;
        $this->enrollmentFieldPath = $values['enrollmentFieldPath'] ?? null;
        $this->enrollmentMode = $values['enrollmentMode'] ?? null;
        $this->enrollmentPaused = $values['enrollmentPaused'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->graphEdit = $values['graphEdit'] ?? null;
        $this->inactiveDays = $values['inactiveDays'] ?? null;
        $this->inactivityBaseline = $values['inactivityBaseline'] ?? null;
        $this->insertSteps = $values['insertSteps'] ?? null;
        $this->integrationEventKey = $values['integrationEventKey'] ?? null;
        $this->integrationSlug = $values['integrationSlug'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->listScope = $values['listScope'] ?? null;
        $this->minCount = $values['minCount'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nodeUpdates = $values['nodeUpdates'] ?? null;
        $this->propertyFilters = $values['propertyFilters'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->smsSteps = $values['smsSteps'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
        $this->stopOnSegmentExit = $values['stopOnSegmentExit'] ?? null;
        $this->subscriberUpdateSteps = $values['subscriberUpdateSteps'] ?? null;
        $this->tagName = $values['tagName'] ?? null;
        $this->tagNames = $values['tagNames'] ?? null;
        $this->timeWindowDays = $values['timeWindowDays'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->userCancellable = $values['userCancellable'] ?? null;
    }
}
