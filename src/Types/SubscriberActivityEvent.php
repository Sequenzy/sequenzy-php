<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class SubscriberActivityEvent extends JsonSerializableType
{
    /**
     * @var ?string $bounceType
     */
    #[JsonProperty('bounceType')]
    public ?string $bounceType;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?array<string> $classificationReasons Classification reason codes for open/click events.
     */
    #[JsonProperty('classificationReasons'), ArrayType(['string'])]
    public ?array $classificationReasons;

    /**
     * @var ?string $clickedUrl
     */
    #[JsonProperty('clickedUrl')]
    public ?string $clickedUrl;

    /**
     * @var ?string $emailSendId
     */
    #[JsonProperty('emailSendId')]
    public ?string $emailSendId;

    /**
     * @var ?value-of<SubscriberActivityEventEngagementQuality> $engagementQuality Engagement classification for open/click events.
     */
    #[JsonProperty('engagementQuality')]
    public ?string $engagementQuality;

    /**
     * @var ?string $eventName
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?DateTime $eventTime
     */
    #[JsonProperty('eventTime'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $eventTime;

    /**
     * @var ?string $eventType Email event type (send, delivery, open, click, bounce, complaint, unsubscribe, delivery_delay), "custom" for subscriber events, or an SMS event type (sms_sent, sms_delivered, sms_failed, sms_clicked, sms_opted_out). New types may be added over time.
     */
    #[JsonProperty('eventType')]
    public ?string $eventType;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $machine Whether this open/click event is classified as bot/scanner activity.
     */
    #[JsonProperty('machine')]
    public ?bool $machine;

    /**
     * @var ?array<string, mixed> $properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @var ?string $smsErrorCode Carrier or provider error code. Present only on sms_failed events.
     */
    #[JsonProperty('smsErrorCode')]
    public ?string $smsErrorCode;

    /**
     * @var ?int $smsSegments Number of SMS segments the message was split into. Present only on sms_* events.
     */
    #[JsonProperty('smsSegments')]
    public ?int $smsSegments;

    /**
     * @var ?string $smsSendId SMS send this event belongs to. Present only on sms_* events.
     */
    #[JsonProperty('smsSendId')]
    public ?string $smsSendId;

    /**
     * @param array{
     *   bounceType?: ?string,
     *   campaignId?: ?string,
     *   classificationReasons?: ?array<string>,
     *   clickedUrl?: ?string,
     *   emailSendId?: ?string,
     *   engagementQuality?: ?value-of<SubscriberActivityEventEngagementQuality>,
     *   eventName?: ?string,
     *   eventTime?: ?DateTime,
     *   eventType?: ?string,
     *   id?: ?string,
     *   machine?: ?bool,
     *   properties?: ?array<string, mixed>,
     *   smsErrorCode?: ?string,
     *   smsSegments?: ?int,
     *   smsSendId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounceType = $values['bounceType'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->classificationReasons = $values['classificationReasons'] ?? null;
        $this->clickedUrl = $values['clickedUrl'] ?? null;
        $this->emailSendId = $values['emailSendId'] ?? null;
        $this->engagementQuality = $values['engagementQuality'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->eventTime = $values['eventTime'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->machine = $values['machine'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->smsErrorCode = $values['smsErrorCode'] ?? null;
        $this->smsSegments = $values['smsSegments'] ?? null;
        $this->smsSendId = $values['smsSendId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
