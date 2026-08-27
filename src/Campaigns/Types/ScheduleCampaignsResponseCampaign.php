<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class ScheduleCampaignsResponseCampaign extends JsonSerializableType
{
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
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?string $scheduledTimezone IANA timezone that anchors scheduledAt's wall-clock time.
     */
    #[JsonProperty('scheduledTimezone')]
    public ?string $scheduledTimezone;

    /**
     * @var ?bool $sendInRecipientTimezone Whether delivery follows each recipient's local wall clock.
     */
    #[JsonProperty('sendInRecipientTimezone')]
    public ?bool $sendInRecipientTimezone;

    /**
     * @var ?value-of<ScheduleCampaignsResponseCampaignStatus> $status `scheduled` when the send job was queued. `waiting_approval` when the campaign was held for safety review - common on new accounts and recently registered sending domains - in which case no send job is queued and jobId is omitted.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   id?: ?string,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   previewUrl?: ?string,
     *   scheduledAt?: ?DateTime,
     *   scheduledTimezone?: ?string,
     *   sendInRecipientTimezone?: ?bool,
     *   status?: ?value-of<ScheduleCampaignsResponseCampaignStatus>,
     *   subject?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewUrl = $values['previewUrl'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->scheduledTimezone = $values['scheduledTimezone'] ?? null;
        $this->sendInRecipientTimezone = $values['sendInRecipientTimezone'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
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
