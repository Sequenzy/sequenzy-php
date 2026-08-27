<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\CampaignSummary;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;

class CampaignDetail extends JsonSerializableType
{
    use CampaignSummary;

    /**
     * @var ?array<string> $bccEmails Addresses BCC'd on every recipient's email for this campaign.
     */
    #[JsonProperty('bccEmails'), ArrayType(['string'])]
    public ?array $bccEmails;

    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?array<string, mixed> $campaignData
     */
    #[JsonProperty('campaignData'), ArrayType(['string' => 'mixed'])]
    public ?array $campaignData;

    /**
     * @var ?array<string> $ccEmails Addresses CC'd on every recipient's email for this campaign.
     */
    #[JsonProperty('ccEmails'), ArrayType(['string'])]
    public ?array $ccEmails;

    /**
     * @var ?array<array<string, mixed>> $computedLists
     */
    #[JsonProperty('computedLists'), ArrayType([['string' => 'mixed']])]
    public ?array $computedLists;

    /**
     * @var ?string $fromEmail
     */
    #[JsonProperty('fromEmail')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromName
     */
    #[JsonProperty('fromName')]
    public ?string $fromName;

    /**
     * @var ?string $preheader
     */
    #[JsonProperty('preheader')]
    public ?string $preheader;

    /**
     * @var ?string $preheaderText Compatibility alias for preheader.
     */
    #[JsonProperty('preheaderText')]
    public ?string $preheaderText;

    /**
     * @var ?string $replyProfileId
     */
    #[JsonProperty('replyProfileId')]
    public ?string $replyProfileId;

    /**
     * @var ?string $replyToEmail
     */
    #[JsonProperty('replyToEmail')]
    public ?string $replyToEmail;

    /**
     * @var ?string $replyToName
     */
    #[JsonProperty('replyToName')]
    public ?string $replyToName;

    /**
     * @var ?string $senderProfileId
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?string $shareUrl Public anonymized view-in-browser link, or null until one is minted via POST /campaigns/{campaignId}/share-link.
     */
    #[JsonProperty('shareUrl')]
    public ?string $shareUrl;

    /**
     * @var ?array<string, mixed> $targetLists Saved campaign audience, or null when targeting is still unset and scheduling will fall back to all active subscribers.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   rejectionComment?: ?string,
     *   scheduledAt?: ?DateTime,
     *   scheduledTimezone?: ?string,
     *   sendInRecipientTimezone?: ?bool,
     *   sendTimeOptimization?: ?bool,
     *   sendTimeWindowHours?: ?int,
     *   sentAt?: ?DateTime,
     *   spreadOverHours?: ?int,
     *   status?: ?value-of<CampaignStatus>,
     *   subject?: ?string,
     *   trackingCode?: ?string,
     *   type?: ?value-of<CampaignChannel>,
     *   bccEmails?: ?array<string>,
     *   blocks?: ?array<EmailBlock>,
     *   campaignData?: ?array<string, mixed>,
     *   ccEmails?: ?array<string>,
     *   computedLists?: ?array<array<string, mixed>>,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   preheader?: ?string,
     *   preheaderText?: ?string,
     *   replyProfileId?: ?string,
     *   replyToEmail?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   shareUrl?: ?string,
     *   targetLists?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->rejectionComment = $values['rejectionComment'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->scheduledTimezone = $values['scheduledTimezone'] ?? null;
        $this->sendInRecipientTimezone = $values['sendInRecipientTimezone'] ?? null;
        $this->sendTimeOptimization = $values['sendTimeOptimization'] ?? null;
        $this->sendTimeWindowHours = $values['sendTimeWindowHours'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->spreadOverHours = $values['spreadOverHours'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->trackingCode = $values['trackingCode'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->bccEmails = $values['bccEmails'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->campaignData = $values['campaignData'] ?? null;
        $this->ccEmails = $values['ccEmails'] ?? null;
        $this->computedLists = $values['computedLists'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->preheader = $values['preheader'] ?? null;
        $this->preheaderText = $values['preheaderText'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyToEmail = $values['replyToEmail'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->shareUrl = $values['shareUrl'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
