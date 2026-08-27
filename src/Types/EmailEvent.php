<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class EmailEvent extends JsonSerializableType
{
    /**
     * @var ?string $abTestId
     */
    #[JsonProperty('abTestId')]
    public ?string $abTestId;

    /**
     * @var ?string $abTestVariantId
     */
    #[JsonProperty('abTestVariantId')]
    public ?string $abTestVariantId;

    /**
     * @var ?string $bounceSubType
     */
    #[JsonProperty('bounceSubType')]
    public ?string $bounceSubType;

    /**
     * @var ?string $bounceType
     */
    #[JsonProperty('bounceType')]
    public ?string $bounceType;

    /**
     * @var ?string $campaignId Campaign ID for campaigns, or automation email node ID for sequence events.
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?string $clickedUrl
     */
    #[JsonProperty('clickedUrl')]
    public ?string $clickedUrl;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?string $complaintType
     */
    #[JsonProperty('complaintType')]
    public ?string $complaintType;

    /**
     * @var ?string $countryCode
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $emailName
     */
    #[JsonProperty('emailName')]
    public ?string $emailName;

    /**
     * @var ?string $emailSendId
     */
    #[JsonProperty('emailSendId')]
    public ?string $emailSendId;

    /**
     * @var ?value-of<EmailEventEmailType> $emailType
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var ?DateTime $eventTime
     */
    #[JsonProperty('eventTime'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $eventTime;

    /**
     * @var ?value-of<EmailEventEventType> $eventType
     */
    #[JsonProperty('eventType')]
    public ?string $eventType;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $ipAddress
     */
    #[JsonProperty('ipAddress')]
    public ?string $ipAddress;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?string $transactionalEmailId
     */
    #[JsonProperty('transactionalEmailId')]
    public ?string $transactionalEmailId;

    /**
     * @var ?string $userAgent
     */
    #[JsonProperty('userAgent')]
    public ?string $userAgent;

    /**
     * @param array{
     *   abTestId?: ?string,
     *   abTestVariantId?: ?string,
     *   bounceSubType?: ?string,
     *   bounceType?: ?string,
     *   campaignId?: ?string,
     *   clickedUrl?: ?string,
     *   companyId?: ?string,
     *   complaintType?: ?string,
     *   countryCode?: ?string,
     *   email?: ?string,
     *   emailName?: ?string,
     *   emailSendId?: ?string,
     *   emailType?: ?value-of<EmailEventEmailType>,
     *   eventTime?: ?DateTime,
     *   eventType?: ?value-of<EmailEventEventType>,
     *   id?: ?string,
     *   ipAddress?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   subscriberId?: ?string,
     *   transactionalEmailId?: ?string,
     *   userAgent?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTestId = $values['abTestId'] ?? null;
        $this->abTestVariantId = $values['abTestVariantId'] ?? null;
        $this->bounceSubType = $values['bounceSubType'] ?? null;
        $this->bounceType = $values['bounceType'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->clickedUrl = $values['clickedUrl'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->complaintType = $values['complaintType'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->emailName = $values['emailName'] ?? null;
        $this->emailSendId = $values['emailSendId'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->eventTime = $values['eventTime'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->ipAddress = $values['ipAddress'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->transactionalEmailId = $values['transactionalEmailId'] ?? null;
        $this->userAgent = $values['userAgent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
