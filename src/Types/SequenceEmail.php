<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEmail extends JsonSerializableType
{
    /**
     * @var ?SequenceAbTestStepSummary $abTest Null on ordinary email steps. Present on action_ab_test steps.
     */
    #[JsonProperty('abTest')]
    public ?SequenceAbTestStepSummary $abTest;

    /**
     * @var ?array<UrlAttachment> $attachments URL-backed file attachments configured on this email step, including event-backed URL templates.
     */
    #[JsonProperty('attachments'), ArrayType([UrlAttachment::class])]
    public ?array $attachments;

    /**
     * @var ?array<string> $bccEmails
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?array<string> $ccEmails
     */
    #[JsonProperty('ccEmails'), ArrayType(['string'])]
    public ?array $ccEmails;

    /**
     * @var ?string $delayDescription Description stored on the preceding logic_delay node, when present.
     */
    #[JsonProperty('delayDescription')]
    public ?string $delayDescription;

    /**
     * @var ?string $delayDisplay Human-readable delay before this email, derived from the preceding logic_delay node when present.
     */
    #[JsonProperty('delayDisplay')]
    public ?string $delayDisplay;

    /**
     * @var ?value-of<SequenceEmailDelayMode> $delayMode Delay mode for the preceding logic_delay node, when present.
     */
    #[JsonProperty('delayMode')]
    public ?string $delayMode;

    /**
     * @var ?float $delayMs Delay before this email in milliseconds, derived from the preceding logic_delay node when present.
     */
    #[JsonProperty('delayMs')]
    public ?float $delayMs;

    /**
     * @var ?string $delayNodeId ID of the logic_delay node immediately before this email, when present.
     */
    #[JsonProperty('delayNodeId')]
    public ?string $delayNodeId;

    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?value-of<SequenceEmailEmailPreset> $emailPreset Effective per-email Style > Format derived from native persisted blocks, including emails that contain supported custom HTML blocks. Null when the node has no linked email or the entire email is standalone raw HTML.
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?array<string, mixed> $emailTheme Theme override stored on this step's linked email. Null when the step has no override and renders on the company theme.
     */
    #[JsonProperty('emailTheme'), ArrayType(['string' => 'mixed'])]
    public ?array $emailTheme;

    /**
     * @var ?string $fromName
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?bool $isTransactional
     */
    #[JsonProperty('isTransactional')]
    public ?bool $isTransactional;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $nodeId
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?value-of<SequenceEmailNodeType> $nodeType Step type. action_ab_test steps keep their copy on the A/B test variants; the fields below report control variant A.
     */
    #[JsonProperty('nodeType')]
    public ?string $nodeType;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $replyProfileId
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $senderProfileId
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?float $stepNumber
     */
    #[JsonProperty('stepNumber')]
    public ?float $stepNumber;

    /**
     * @var ?float $structuralStepNumber Graph-derived email depth, or null when the node is not reachable from a trigger. Parallel branch emails intentionally share a depth.
     */
    #[JsonProperty('structuralStepNumber')]
    public ?float $structuralStepNumber;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?SequenceWaitUntilInput $waitUntil Date-field wait metadata for dynamic wait-until-date delays.
     */
    #[JsonProperty('waitUntil')]
    public ?SequenceWaitUntilInput $waitUntil;

    /**
     * @var ?SequenceWaitUntilWeekdayInput $waitUntilWeekday Weekday-window metadata for dynamic wait-until-weekday delays.
     */
    #[JsonProperty('waitUntilWeekday')]
    public ?SequenceWaitUntilWeekdayInput $waitUntilWeekday;

    /**
     * @param array{
     *   abTest?: ?SequenceAbTestStepSummary,
     *   attachments?: ?array<UrlAttachment>,
     *   bccEmails?: ?array<string>,
     *   blocks?: ?array<EmailBlock>,
     *   ccEmails?: ?array<string>,
     *   delayDescription?: ?string,
     *   delayDisplay?: ?string,
     *   delayMode?: ?value-of<SequenceEmailDelayMode>,
     *   delayMs?: ?float,
     *   delayNodeId?: ?string,
     *   emailId?: ?string,
     *   emailPreset?: ?value-of<SequenceEmailEmailPreset>,
     *   emailTheme?: ?array<string, mixed>,
     *   fromName?: ?string,
     *   isTransactional?: ?bool,
     *   name?: ?string,
     *   nodeId?: ?string,
     *   nodeType?: ?value-of<SequenceEmailNodeType>,
     *   previewText?: ?string,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   senderProfileId?: ?string,
     *   stepNumber?: ?float,
     *   structuralStepNumber?: ?float,
     *   subject?: ?string,
     *   waitUntil?: ?SequenceWaitUntilInput,
     *   waitUntilWeekday?: ?SequenceWaitUntilWeekdayInput,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTest = $values['abTest'] ?? null;
        $this->attachments = $values['attachments'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->ccEmails = $values['ccEmails'] ?? null;
        $this->delayDescription = $values['delayDescription'] ?? null;
        $this->delayDisplay = $values['delayDisplay'] ?? null;
        $this->delayMode = $values['delayMode'] ?? null;
        $this->delayMs = $values['delayMs'] ?? null;
        $this->delayNodeId = $values['delayNodeId'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->isTransactional = $values['isTransactional'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->nodeType = $values['nodeType'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->stepNumber = $values['stepNumber'] ?? null;
        $this->structuralStepNumber = $values['structuralStepNumber'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->waitUntil = $values['waitUntil'] ?? null;
        $this->waitUntilWeekday = $values['waitUntilWeekday'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
