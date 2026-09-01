<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Campaigns\Types\CreateCampaignsRequestEmailPreset;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Campaigns\Types\CreateCampaignsRequestStatus;

class CreateCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Sequenzy email blocks. Mutually exclusive with html. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?array<string, mixed> $campaignData
     */
    #[JsonProperty('campaignData'), ArrayType(['string' => 'mixed'])]
    public ?array $campaignData;

    /**
     * @var ?array<array<string, mixed>> $computedLists
     */
    #[JsonProperty('computedLists'), ArrayType([['string' => 'mixed']])]
    public ?array $computedLists;

    /**
     * @var ?value-of<CreateCampaignsRequestEmailPreset> $emailPreset Per-email Style > Format for native Sequenzy blocks. This is separate from the prompt-generation `style` field. Cannot be combined with `html`, and a template or blocks payload stored as one standalone raw HTML block does not support it. Applying `minimal` removes standalone logo blocks; switching back to `branded` generates a new logo unless the authored logo block is sent again.
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?string $fromEmail Campaign From address. Its domain must be configured and verified.
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName Display name recipients see, e.g. 'Brennon at TradeTally'. Selects the sender identity of that name on fromEmail, creating it when the address has no identity by that name; the mailbox's other display names, and everything pinned to them, are untouched. Requires fromEmail; omit it when using senderProfileId, which already carries its own display name.
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?string $html Raw HTML body. Mutually exclusive with blocks.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?array<string> $label Compatibility alias for labels.
     */
    #[JsonProperty('label'), ArrayType(['string'])]
    public ?array $label;

    /**
     * @var ?array<string> $labels Label names to assign. Missing labels are created automatically.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?array<string> $listIds Shorthand for targeting one or more lists. Equivalent to `targetLists` `{"type":"lists","listIds":["list_123"]}`. Mutually exclusive with targetLists and segmentId.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $preheaderText Compatibility alias for previewText.
     */
    #[JsonProperty('preheaderText')]
    public ?string $preheaderText;

    /**
     * @var ?string $previewText Optional inbox preview text saved on the linked email.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $prompt Natural-language request for branded native campaign blocks.
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?string $replyProfileId Existing reply profile ID. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Campaign Reply-To address. A reply profile is created when needed.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $segmentId Shorthand for targeting one saved segment. Equivalent to `targetLists` `{"type":"segment","segmentId":"seg_123"}`. Mutually exclusive with targetLists and listIds.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var ?string $senderProfileId Existing sender profile ID. It already supplies both the From address and display name, so send it on its own and omit fromEmail and fromName.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?DateTime $sentAt ISO date-time for an imported/already-sent campaign. Only valid with status sent; defaults to now when omitted.
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @var ?value-of<CreateCampaignsRequestStatus> $status Initial status. Defaults to draft. Use sent only for imported/already-sent campaigns.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $style Generation style; valid only with prompt. Pass designed or plain to force the designed or plain-text email style; other values are freeform prompt guidance. Defaults to the company's email style preference.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?string $subject Required with HTML, blocks, or templateId; optional with prompt, where it overrides the generated subject.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?array<string, mixed> $targetLists Campaign audience saved on the draft. Omit to leave targeting unset and choose it when scheduling. The object is a union discriminated on type: {"type":"all"}, {"type":"lists","listIds":["list_123"]}, {"type":"segment","segmentId":"seg_123"}, {"type":"filtered","filters":[],"filterJoinOperator":"and"}, {"type":"rules","include":[],"exclude":[]}. Mutually exclusive with segmentId and listIds.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?string $templateId Company-owned email template to copy into the campaign. Mutually exclusive with prompt, HTML, and blocks.
     */
    #[JsonProperty('templateId')]
    public ?string $templateId;

    /**
     * @var ?string $tone Generation tone; valid only with prompt.
     */
    #[JsonProperty('tone')]
    public ?string $tone;

    /**
     * @var ?string $trackingCode Optional campaign tracking code available to UTM templates as `{{campaign.trackingCode}}`. Empty strings are stored as null.
     */
    #[JsonProperty('trackingCode')]
    public ?string $trackingCode;

    /**
     * @param array{
     *   name: string,
     *   blocks?: ?array<array<string, mixed>>,
     *   campaignData?: ?array<string, mixed>,
     *   computedLists?: ?array<array<string, mixed>>,
     *   emailPreset?: ?value-of<CreateCampaignsRequestEmailPreset>,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   html?: ?string,
     *   label?: ?array<string>,
     *   labels?: ?array<string>,
     *   listIds?: ?array<string>,
     *   preheaderText?: ?string,
     *   previewText?: ?string,
     *   prompt?: ?string,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   segmentId?: ?string,
     *   senderProfileId?: ?string,
     *   sentAt?: ?DateTime,
     *   status?: ?value-of<CreateCampaignsRequestStatus>,
     *   style?: ?string,
     *   subject?: ?string,
     *   targetLists?: ?array<string, mixed>,
     *   templateId?: ?string,
     *   tone?: ?string,
     *   trackingCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->campaignData = $values['campaignData'] ?? null;
        $this->computedLists = $values['computedLists'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->name = $values['name'];
        $this->preheaderText = $values['preheaderText'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->style = $values['style'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
        $this->tone = $values['tone'] ?? null;
        $this->trackingCode = $values['trackingCode'] ?? null;
    }
}
