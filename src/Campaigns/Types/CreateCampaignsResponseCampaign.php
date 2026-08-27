<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailPreset;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class CreateCampaignsResponseCampaign extends JsonSerializableType
{
    /**
     * @var ?string $emailId The linked email body, reusable as `templateId` when creating later campaigns.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?value-of<EmailPreset> $emailPreset
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
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string> $labels
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewUrl
     */
    #[JsonProperty('previewUrl')]
    public ?string $previewUrl;

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
     * @var ?DateTime $sentAt Present when the campaign is created as an imported/already-sent campaign.
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?array<string, mixed> $targetLists Saved campaign audience, or null when targeting is still unset.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?string $trackingCode Campaign tracking code available to UTM templates as `{{campaign.trackingCode}}`.
     */
    #[JsonProperty('trackingCode')]
    public ?string $trackingCode;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   emailId?: ?string,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   previewUrl?: ?string,
     *   replyProfileId?: ?string,
     *   replyToEmail?: ?string,
     *   replyToName?: ?string,
     *   senderProfileId?: ?string,
     *   sentAt?: ?DateTime,
     *   status?: ?string,
     *   subject?: ?string,
     *   targetLists?: ?array<string, mixed>,
     *   trackingCode?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailId = $values['emailId'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewUrl = $values['previewUrl'] ?? null;
        $this->replyProfileId = $values['replyProfileId'] ?? null;
        $this->replyToEmail = $values['replyToEmail'] ?? null;
        $this->replyToName = $values['replyToName'] ?? null;
        $this->senderProfileId = $values['senderProfileId'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->trackingCode = $values['trackingCode'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
