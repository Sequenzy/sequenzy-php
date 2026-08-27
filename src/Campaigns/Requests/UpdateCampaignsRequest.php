<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Campaigns\Types\UpdateCampaignsRequestEmailPreset;

class UpdateCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $bccEmails Addresses BCC'd on every recipient's email for this campaign. Send an empty array or null to clear them.
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?array<array<string, mixed>> $blocks Updated Sequenzy email blocks. Mutually exclusive with `html`. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?array<string, mixed> $campaignData Campaign-scoped JSON data available while rendering this campaign. Top-level arrays can contain up to 500 items. Set to null to clear it.
     */
    #[JsonProperty('campaignData'), ArrayType(['string' => 'mixed'])]
    public ?array $campaignData;

    /**
     * @var ?array<string> $ccEmails Addresses CC'd on every recipient's email for this campaign. Send an empty array or null to clear them.
     */
    #[JsonProperty('ccEmails'), ArrayType(['string'])]
    public ?array $ccEmails;

    /**
     * @var ?array<array<string, mixed>> $computedLists Personalized list definitions computed from campaignData. Keys can use letters, numbers, underscores, and dots. Use maxItems to cap each subscriber's list length. Pass an empty array to clear computed lists.
     */
    #[JsonProperty('computedLists'), ArrayType([['string' => 'mixed']])]
    public ?array $computedLists;

    /**
     * @var ?value-of<UpdateCampaignsRequestEmailPreset> $emailPreset Change the linked email's Style > Format without rewriting its copy. Supported only for native Sequenzy blocks and cannot be combined with `html`. An email stored as one standalone raw HTML block does not support it. Applying `minimal` removes standalone logo blocks; switching back to `branded` generates a new logo unless the authored logo block is sent again.
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
     * @var ?string $html Updated email HTML content. Mutually exclusive with `blocks`.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?array<string> $label Compatibility alias for labels.
     */
    #[JsonProperty('label'), ArrayType(['string'])]
    public ?array $label;

    /**
     * @var ?array<string> $labels Replacement label names. Send an empty array to clear labels. Missing labels are created automatically.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?array<string> $listIds Shorthand for retargeting the draft at one or more lists. Equivalent to `targetLists` `{"type":"lists","listIds":["list_123"]}`. Mutually exclusive with targetLists and segmentId.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?string $name Updated campaign name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $preheaderText Compatibility alias for previewText.
     */
    #[JsonProperty('preheaderText')]
    public ?string $preheaderText;

    /**
     * @var ?string $previewText Updated inbox preview text. Set to null to clear it.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $replyProfileId Reply profile ID for this company. It already supplies both the Reply-To address and display name, so send it on its own and omit replyTo and replyToName.
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyTo Reply-To email for this campaign. A profile is created when needed. Mutually exclusive with `replyProfileId`.
     */
    #[JsonProperty('replyTo')]
    public ?string $replyTo;

    /**
     * @var ?string $replyToName Display name for the Reply-To address. Requires replyTo; omit it when using replyProfileId, which already carries its own display name. An address carries one Reply-To name company-wide, so if replyTo already has a saved profile under a different name, that saved name is kept and the response `warnings` array says so.
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $segmentId Shorthand for retargeting the draft at one saved segment. Equivalent to `targetLists` `{"type":"segment","segmentId":"seg_123"}`. Mutually exclusive with targetLists and listIds.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var ?string $senderProfileId Existing sender profile ID. It already supplies both the From address and display name, so send it on its own and omit fromEmail and fromName.
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?bool $sendTimeOptimization Deliver each recipient at their predicted best open hour within sendTimeWindowHours of scheduledAt. Campaign-only: there is no company or sequence STO toggle. Sequences use sendingWindow instead. Persists on the draft until schedule overrides it. spreadOverHours and sendInRecipientTimezone each turn STO off.
     */
    #[JsonProperty('sendTimeOptimization')]
    public ?bool $sendTimeOptimization;

    /**
     * @var ?int $sendTimeWindowHours STO delivery window in hours from scheduledAt. Defaults to 12. Only used when sendTimeOptimization is true.
     */
    #[JsonProperty('sendTimeWindowHours')]
    public ?int $sendTimeWindowHours;

    /**
     * @var ?string $subject Updated email subject line
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?array<string, mixed> $targetLists Replacement campaign audience, using the same shapes as campaign create, e.g. {"type":"lists","listIds":["list_123"]}. Send null to clear saved targeting and choose the audience when scheduling; omit to leave it unchanged. Mutually exclusive with segmentId and listIds.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?string $trackingCode Campaign tracking code available to UTM templates as `{{campaign.trackingCode}}`. Send an empty string or null to clear it.
     */
    #[JsonProperty('trackingCode')]
    public ?string $trackingCode;

    /**
     * @param array{
     *   bccEmails?: ?array<string>,
     *   blocks?: ?array<array<string, mixed>>,
     *   campaignData?: ?array<string, mixed>,
     *   ccEmails?: ?array<string>,
     *   computedLists?: ?array<array<string, mixed>>,
     *   emailPreset?: ?value-of<UpdateCampaignsRequestEmailPreset>,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   html?: ?string,
     *   label?: ?array<string>,
     *   labels?: ?array<string>,
     *   listIds?: ?array<string>,
     *   name?: ?string,
     *   preheaderText?: ?string,
     *   previewText?: ?string,
     *   replyProfileId?: ?string,
     *   replyTo?: ?string,
     *   replyToName?: ?string,
     *   segmentId?: ?string,
     *   senderProfileId?: ?string,
     *   sendTimeOptimization?: ?bool,
     *   sendTimeWindowHours?: ?int,
     *   subject?: ?string,
     *   targetLists?: ?array<string, mixed>,
     *   trackingCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->campaignData = $values['campaignData'] ?? null;
        $this->ccEmails = $values['ccEmails'] ?? null;
        $this->computedLists = $values['computedLists'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->preheaderText = $values['preheaderText'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sendTimeOptimization = $values['sendTimeOptimization'] ?? null;
        $this->sendTimeWindowHours = $values['sendTimeWindowHours'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->trackingCode = $values['trackingCode'] ?? null;
    }
}
