<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Step created inside a sequence path.
 */
class SequenceBranchPathStepInput extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks Email blocks for email steps. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?SequencePathStepConfig $config
     */
    #[JsonProperty('config')]
    public ?SequencePathStepConfig $config;

    /**
     * @var ?SequenceDelayInput $delay
     */
    #[JsonProperty('delay')]
    public ?SequenceDelayInput $delay;

    /**
     * @var ?float $delayMs Delay in milliseconds. Useful for standalone delay steps.
     */
    #[JsonProperty('delayMs')]
    public ?float $delayMs;

    /**
     * @var ?array<string, mixed> $discount Discount configuration for create_discount steps.
     */
    #[JsonProperty('discount'), ArrayType(['string' => 'mixed'])]
    public ?array $discount;

    /**
     * @var ?string $fromEmail Email steps only. From address for the new step; its domain must be verified. Mutually exclusive with senderProfileId.
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName Email steps only. Display name override for the new step. With fromEmail, also names a newly created sender profile.
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?string $html HTML content for email steps.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?array<string> $imageUrls SMS steps only. Up to 2 publicly reachable image URLs sent as MMS media.
     */
    #[JsonProperty('imageUrls'), ArrayType(['string'])]
    public ?array $imageUrls;

    /**
     * @var ?value-of<SequenceBranchPathStepInputIneligibleAction> $ineligibleAction SMS steps only. skip (default) continues the sequence when the contact can't receive SMS; exit removes them from the sequence.
     */
    #[JsonProperty('ineligibleAction')]
    public ?string $ineligibleAction;

    /**
     * @var ?string $label SMS steps only. Display label for the step in the builder.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $name Email template name for email steps.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<SequenceBranchPathStepInputNodeType> $nodeType Advanced node type for non-email sequence path actions.
     */
    #[JsonProperty('nodeType')]
    public ?string $nodeType;

    /**
     * @var ?string $previewText Email preview text.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $replyProfileId Email steps only. Reply profile for the new step. Omit to inherit from the preceding email step. Mutually exclusive with replyTo.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Email steps only. Reply-To address for the new step. Mutually exclusive with replyProfileId.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Email steps only. Reply-To display name override for this step. Requires replyTo; omit it when using replyProfileId, which already carries its own display name.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $senderProfileId Email steps only. Sender profile for the new step. Omit to inherit the sender identity of the email step it is inserted after. Mutually exclusive with fromEmail.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?string $subject Email subject. Required for email steps.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $text SMS steps only. Plain-text message body; merge tags like {{FIRST_NAME}} work.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var ?value-of<SequenceBranchPathStepInputType> $type Step type. Omit for email steps, use sms for a native SMS step, or use delay for a standalone wait.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?SequenceWaitUntilInput $waitUntil
     */
    #[JsonProperty('waitUntil')]
    public ?SequenceWaitUntilInput $waitUntil;

    /**
     * @var ?SequenceWaitUntilWeekdayInput $waitUntilWeekday
     */
    #[JsonProperty('waitUntilWeekday')]
    public ?SequenceWaitUntilWeekdayInput $waitUntilWeekday;

    /**
     * @param array{
     *   blocks?: ?array<EmailBlock>,
     *   config?: ?SequencePathStepConfig,
     *   delay?: ?SequenceDelayInput,
     *   delayMs?: ?float,
     *   discount?: ?array<string, mixed>,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   html?: ?string,
     *   imageUrls?: ?array<string>,
     *   ineligibleAction?: ?value-of<SequenceBranchPathStepInputIneligibleAction>,
     *   label?: ?string,
     *   name?: ?string,
     *   nodeType?: ?value-of<SequenceBranchPathStepInputNodeType>,
     *   previewText?: ?string,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   subject?: ?string,
     *   text?: ?string,
     *   type?: ?value-of<SequenceBranchPathStepInputType>,
     *   waitUntil?: ?SequenceWaitUntilInput,
     *   waitUntilWeekday?: ?SequenceWaitUntilWeekdayInput,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->config = $values['config'] ?? null;
        $this->delay = $values['delay'] ?? null;
        $this->delayMs = $values['delayMs'] ?? null;
        $this->discount = $values['discount'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->imageUrls = $values['imageUrls'] ?? null;
        $this->ineligibleAction = $values['ineligibleAction'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nodeType = $values['nodeType'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->text = $values['text'] ?? null;
        $this->type = $values['type'] ?? null;
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
