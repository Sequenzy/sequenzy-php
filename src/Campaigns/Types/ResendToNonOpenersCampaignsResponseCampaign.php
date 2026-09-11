<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\EmailBlock;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Types\EmailPreset;
use Sequenzy\Types\CampaignStatus;
use Sequenzy\Types\CampaignChannel;

class ResendToNonOpenersCampaignsResponseCampaign extends JsonSerializableType
{
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
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $emailId ID of the new resend email.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?value-of<EmailPreset> $emailPreset Style > Format of the linked email. Null for SMS campaigns and for an email stored as a single raw HTML block.
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

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
     * @var ?bool $hasAudience Whether an explicit audience is configured. False for unset or empty selections. This does not validate resource existence or count eligible recipients. Draft rows can use this for an Audience set indicator.
     */
    #[JsonProperty('hasAudience')]
    public ?bool $hasAudience;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string> $labels Label names assigned to this campaign.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

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
     * @var ?string $rejectionComment Reviewer feedback when the campaign status is rejected. Stays null while a campaign is still in waiting_approval.
     */
    #[JsonProperty('rejectionComment')]
    public ?string $rejectionComment;

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
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?string $scheduledTimezone Stored IANA timezone that anchors the campaign's scheduled wall-clock time. Use sendInRecipientTimezone to determine whether recipient-timezone delivery is enabled; this value may remain set when that mode is disabled.
     */
    #[JsonProperty('scheduledTimezone')]
    public ?string $scheduledTimezone;

    /**
     * @var ?string $senderProfileId
     */
    #[JsonProperty('senderProfileId')]
    public ?string $senderProfileId;

    /**
     * @var ?bool $sendInRecipientTimezone Whether the campaign is delivered at the scheduled wall-clock time in each recipient's timezone.
     */
    #[JsonProperty('sendInRecipientTimezone')]
    public ?bool $sendInRecipientTimezone;

    /**
     * @var ?bool $sendTimeOptimization Whether each recipient is sent at their best predicted open time. Campaign-only: there is no company or sequence STO setting. Sequences use sendingWindow instead. Always false when spreadOverHours is set: setting a spread clears send time optimization.
     */
    #[JsonProperty('sendTimeOptimization')]
    public ?bool $sendTimeOptimization;

    /**
     * @var ?int $sendTimeWindowHours Window send time optimization may deliver within, in hours from scheduledAt. Defaults to 12 and only applies when sendTimeOptimization is true.
     */
    #[JsonProperty('sendTimeWindowHours')]
    public ?int $sendTimeWindowHours;

    /**
     * @var ?DateTime $sentAt For native sends, when the send finished. It is stamped after the last recipient is handed off, so for a spread or optimal-time send this is the end of the delivery window rather than when sending started. Imported campaigns retain the source provider's timestamp.
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @var ?string $shareUrl Public anonymized view-in-browser link, or null until one is minted via POST /campaigns/{campaignId}/share-link.
     */
    #[JsonProperty('shareUrl')]
    public ?string $shareUrl;

    /**
     * @var ?int $spreadOverHours Hours the send was (or will be) spread over. Null means there is no fixed spread; inspect sendTimeOptimization to distinguish an optimal-time send from a campaign with no recorded pacing. Imported campaigns may not include source-provider pacing data.
     */
    #[JsonProperty('spreadOverHours')]
    public ?int $spreadOverHours;

    /**
     * @var ?value-of<CampaignStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?array<string, mixed> $targetLists Saved campaign audience, or null when targeting is still unset and scheduling will fall back to all active subscribers.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?string $trackingCode Campaign tracking code available to UTM templates as `{{campaign.trackingCode}}`.
     */
    #[JsonProperty('trackingCode')]
    public ?string $trackingCode;

    /**
     * @var ?value-of<CampaignChannel> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   bccEmails?: ?array<string>,
     *   blocks?: ?array<EmailBlock>,
     *   campaignData?: ?array<string, mixed>,
     *   ccEmails?: ?array<string>,
     *   computedLists?: ?array<array<string, mixed>>,
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   hasAudience?: ?bool,
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   preheader?: ?string,
     *   preheaderText?: ?string,
     *   rejectionComment?: ?string,
     *   replyProfileId?: ?string,
     *   replyToEmail?: ?string,
     *   replyToName?: ?string,
     *   scheduledAt?: ?DateTime,
     *   scheduledTimezone?: ?string,
     *   senderProfileId?: ?string,
     *   sendInRecipientTimezone?: ?bool,
     *   sendTimeOptimization?: ?bool,
     *   sendTimeWindowHours?: ?int,
     *   sentAt?: ?DateTime,
     *   shareUrl?: ?string,
     *   spreadOverHours?: ?int,
     *   status?: ?value-of<CampaignStatus>,
     *   subject?: ?string,
     *   targetLists?: ?array<string, mixed>,
     *   trackingCode?: ?string,
     *   type?: ?value-of<CampaignChannel>,
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
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->hasAudience = $values['hasAudience'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->preheader = $values['preheader'] ?? null;
        $this->preheaderText = $values['preheaderText'] ?? null;
        $this->rejectionComment = $values['rejectionComment'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyToEmail = $values['replyToEmail'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->scheduledTimezone = $values['scheduledTimezone'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sendInRecipientTimezone = $values['sendInRecipientTimezone'] ?? null;
        $this->sendTimeOptimization = $values['sendTimeOptimization'] ?? null;
        $this->sendTimeWindowHours = $values['sendTimeWindowHours'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->shareUrl = $values['shareUrl'] ?? null;
        $this->spreadOverHours = $values['spreadOverHours'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->trackingCode = $values['trackingCode'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
