<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class CampaignSummary extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $emailId The linked email body. The same record is returned by the templates endpoints and can be passed as `templateId` when creating campaigns to reuse the design. Null for SMS campaigns.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?value-of<EmailPreset> $emailPreset Style > Format of the linked email. Null for SMS campaigns and for an email stored as a single raw HTML block.
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

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
     * @var ?string $rejectionComment Reviewer feedback when the campaign status is rejected. Stays null while a campaign is still in waiting_approval.
     */
    #[JsonProperty('rejectionComment')]
    public ?string $rejectionComment;

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
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   hasAudience?: ?bool,
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
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->hasAudience = $values['hasAudience'] ?? null;
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
