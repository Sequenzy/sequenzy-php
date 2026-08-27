<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Sequences\Types\SequenceCreateRequestEmailStyle;
use Sequenzy\Types\SequenceEnrollmentMode;
use Sequenzy\Sequences\Types\SequenceCreateRequestInactivityBaseline;
use Sequenzy\Sequences\Types\SequenceCreateRequestListScope;
use Sequenzy\Types\SequenceTriggerPropertyFilter;
use Sequenzy\Types\SequenceSendingWindow;
use Sequenzy\Types\SequenceStepInput;
use Sequenzy\Types\SequenceStopCondition;
use Sequenzy\Types\SequenceTriggerType;

class SequenceCreateRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $bccEmails Addresses blind-copied on every sequence email.
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?array<string, mixed> $customIntegration Custom inbound-webhook integration metadata.
     */
    #[JsonProperty('customIntegration'), ArrayType(['string' => 'mixed'])]
    public ?array $customIntegration;

    /**
     * @var ?string $description Optional dashboard description.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?float $durationDays Total duration in days used to space AI-generated emails. Omit this to use the default sequence delay schedule.
     */
    #[JsonProperty('durationDays')]
    public ?float $durationDays;

    /**
     * @var ?float $emailCount Number of emails for AI-generated content. Defaults to 5. Maximum is 10.
     */
    #[JsonProperty('emailCount')]
    public ?float $emailCount;

    /**
     * @var ?value-of<SequenceCreateRequestEmailStyle> $emailStyle Style for the AI-generated emails: visual (designed, with heroes/imagery/rich sections) or plain (personal, text-first notes with a single button). Defaults to the company's saved preference when omitted.
     */
    #[JsonProperty('emailStyle')]
    public ?string $emailStyle;

    /**
     * @var ?string $enrollmentFieldPath Scalar dot-path event property used by matching_field enrollment, such as order.id or product.providerVariantId. Array traversal with [] is not supported; use propertyFilters for array matching. Applies to event_received and inbound_webhook triggers. Leave empty for built-in Shopify product/variant defaults.
     */
    #[JsonProperty('enrollmentFieldPath')]
    public ?string $enrollmentFieldPath;

    /**
     * @var ?value-of<SequenceEnrollmentMode> $enrollmentMode
     */
    #[JsonProperty('enrollmentMode')]
    public ?string $enrollmentMode;

    /**
     * @var ?string $eventName Event name for event_received, inbound_webhook, inactivity, and frequency triggers.
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
     * @var ?string $goal Goal for AI-generated sequence content. Provide either goal or steps, or omit both for a blank dashboard-compatible draft.
     */
    #[JsonProperty('goal')]
    public ?string $goal;

    /**
     * @var ?float $inactiveDays Days of inactivity before the sequence starts.
     */
    #[JsonProperty('inactiveDays')]
    public ?float $inactiveDays;

    /**
     * @var ?value-of<SequenceCreateRequestInactivityBaseline> $inactivityBaseline For inactivity triggers, controls when to start counting for subscribers who have never performed the event. Defaults to sequence_created_at.
     */
    #[JsonProperty('inactivityBaseline')]
    public ?string $inactivityBaseline;

    /**
     * @var ?string $integrationEventKey Integration event key for inbound_webhook triggers.
     */
    #[JsonProperty('integrationEventKey')]
    public ?string $integrationEventKey;

    /**
     * @var ?string $integrationSlug Integration slug for inbound_webhook triggers.
     */
    #[JsonProperty('integrationSlug')]
    public ?string $integrationSlug;

    /**
     * @var ?array<string> $labels Dashboard label names. Missing labels are created.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $listId List ID for contact_added triggers. Omit it to use listScope instead. Use listIds to trigger on several lists.
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?array<string> $listIds Several list IDs for a contact_added trigger. A contact joining ANY of them enrolls. Takes precedence over listId when both are sent. Cannot be combined with listScope.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?value-of<SequenceCreateRequestListScope> $listScope For contact_added triggers with no list at all. `any_contact` (the default) enrolls every contact added, including contacts that join no list - which is what integrations create when list targeting is empty. `any_list` waits until the contact joins a list. Cannot be combined with listId or listIds.
     */
    #[JsonProperty('listScope')]
    public ?string $listScope;

    /**
     * @var ?float $minCount Minimum event count for frequency triggers.
     */
    #[JsonProperty('minCount')]
    public ?float $minCount;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<SequenceTriggerPropertyFilter> $propertyFilters Event property filters for event_received and inbound_webhook triggers. The sequence only starts when the triggering event's properties match all filters. Use [] in the path to match items inside arrays.
     */
    #[JsonProperty('propertyFilters'), ArrayType([SequenceTriggerPropertyFilter::class])]
    public ?array $propertyFilters;

    /**
     * @var ?string $replyProfileId Existing reply profile ID. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Reply-To address for every email in this sequence. A profile is created when needed.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $segmentId Segment ID for segment_entered triggers.
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
     * @var ?array<SequenceStepInput> $steps Explicit email and action steps. Provide either steps or goal, or omit both for a blank dashboard-compatible draft.
     */
    #[JsonProperty('steps'), ArrayType([SequenceStepInput::class])]
    public ?array $steps;

    /**
     * @var ?SequenceStopCondition $stopCondition
     */
    #[JsonProperty('stopCondition')]
    public ?SequenceStopCondition $stopCondition;

    /**
     * @var ?bool $stopOnSegmentExit For segment_entered triggers, cancel enrollment when the subscriber leaves the segment.
     */
    #[JsonProperty('stopOnSegmentExit')]
    public ?bool $stopOnSegmentExit;

    /**
     * @var ?string $tagName Tag name for tag_added triggers. Use tagNames to trigger on several tags.
     */
    #[JsonProperty('tagName')]
    public ?string $tagName;

    /**
     * @var ?array<string> $tagNames Several tag names for a tag_added trigger. Receiving ANY of them enrolls the contact. Takes precedence over tagName when both are sent.
     */
    #[JsonProperty('tagNames'), ArrayType(['string'])]
    public ?array $tagNames;

    /**
     * @var ?float $timeWindowDays Time window in days for frequency triggers.
     */
    #[JsonProperty('timeWindowDays')]
    public ?float $timeWindowDays;

    /**
     * @var ?value-of<SequenceTriggerType> $trigger Defaults to contact_added when omitted.
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
     *   name: string,
     *   bccEmails?: ?array<string>,
     *   customIntegration?: ?array<string, mixed>,
     *   description?: ?string,
     *   durationDays?: ?float,
     *   emailCount?: ?float,
     *   emailStyle?: ?value-of<SequenceCreateRequestEmailStyle>,
     *   enrollmentFieldPath?: ?string,
     *   enrollmentMode?: ?value-of<SequenceEnrollmentMode>,
     *   eventName?: ?string,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   goal?: ?string,
     *   inactiveDays?: ?float,
     *   inactivityBaseline?: ?value-of<SequenceCreateRequestInactivityBaseline>,
     *   integrationEventKey?: ?string,
     *   integrationSlug?: ?string,
     *   labels?: ?array<string>,
     *   listId?: ?string,
     *   listIds?: ?array<string>,
     *   listScope?: ?value-of<SequenceCreateRequestListScope>,
     *   minCount?: ?float,
     *   propertyFilters?: ?array<SequenceTriggerPropertyFilter>,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   segmentId?: ?string,
     *   senderProfileId?: ?string,
     *   sendingWindow?: ?SequenceSendingWindow,
     *   steps?: ?array<SequenceStepInput>,
     *   stopCondition?: ?SequenceStopCondition,
     *   stopOnSegmentExit?: ?bool,
     *   tagName?: ?string,
     *   tagNames?: ?array<string>,
     *   timeWindowDays?: ?float,
     *   trigger?: ?value-of<SequenceTriggerType>,
     *   userCancellable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->customIntegration = $values['customIntegration'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->durationDays = $values['durationDays'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->emailStyle = $values['emailStyle'] ?? null;
        $this->enrollmentFieldPath = $values['enrollmentFieldPath'] ?? null;
        $this->enrollmentMode = $values['enrollmentMode'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->goal = $values['goal'] ?? null;
        $this->inactiveDays = $values['inactiveDays'] ?? null;
        $this->inactivityBaseline = $values['inactivityBaseline'] ?? null;
        $this->integrationEventKey = $values['integrationEventKey'] ?? null;
        $this->integrationSlug = $values['integrationSlug'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->listScope = $values['listScope'] ?? null;
        $this->minCount = $values['minCount'] ?? null;
        $this->name = $values['name'];
        $this->propertyFilters = $values['propertyFilters'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
        $this->stopOnSegmentExit = $values['stopOnSegmentExit'] ?? null;
        $this->tagName = $values['tagName'] ?? null;
        $this->tagNames = $values['tagNames'] ?? null;
        $this->timeWindowDays = $values['timeWindowDays'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->userCancellable = $values['userCancellable'] ?? null;
    }
}
