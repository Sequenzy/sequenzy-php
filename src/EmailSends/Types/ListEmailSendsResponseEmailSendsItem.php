<?php

namespace Sequenzy\EmailSends\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailSend;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Types\EmailSendAdditionalRecipients;
use Sequenzy\Types\EmailSendAutomation;
use Sequenzy\Types\EmailSendCampaign;
use Sequenzy\Types\EmailSendEmailType;
use Sequenzy\Types\EmailSendInternalFailureCode;
use Sequenzy\Types\EmailSendStatus;
use Sequenzy\Types\EmailSendSubscriber;
use Sequenzy\Types\EmailSendSuppressionReason;
use Sequenzy\Types\EmailSendType;

class ListEmailSendsResponseEmailSendsItem extends JsonSerializableType
{
    use EmailSend;

    /**
     * @var ?bool $clicked
     */
    #[JsonProperty('clicked')]
    public ?bool $clicked;

    /**
     * @var ?DateTime $eventAt
     */
    #[JsonProperty('eventAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $eventAt;

    /**
     * @var ?bool $opened
     */
    #[JsonProperty('opened')]
    public ?bool $opened;

    /**
     * @param array{
     *   abTestVariantId?: ?string,
     *   additionalRecipients?: ?EmailSendAdditionalRecipients,
     *   authenticatedDomainId?: ?string,
     *   automation?: ?EmailSendAutomation,
     *   automationNodeId?: ?string,
     *   automationTokenId?: ?string,
     *   bouncedAt?: ?DateTime,
     *   bounceSubType?: ?string,
     *   bounceType?: ?string,
     *   campaign?: ?EmailSendCampaign,
     *   campaignId?: ?string,
     *   clickedAt?: ?DateTime,
     *   companyId?: ?string,
     *   complainedAt?: ?DateTime,
     *   complaintType?: ?string,
     *   createdAt?: ?DateTime,
     *   deliveredAt?: ?DateTime,
     *   emailBody?: ?string,
     *   emailType?: ?value-of<EmailSendEmailType>,
     *   errorMessage?: ?string,
     *   id?: ?string,
     *   internalFailureCode?: ?value-of<EmailSendInternalFailureCode>,
     *   isCopiedRecipient?: ?bool,
     *   isTestEmail?: ?bool,
     *   isTransactional?: ?bool,
     *   observedSendingIpAddress?: ?string,
     *   openedAt?: ?DateTime,
     *   originalReplyTo?: ?string,
     *   primaryEmailSendId?: ?string,
     *   recipientEmail?: ?string,
     *   senderEmail?: ?string,
     *   senderName?: ?string,
     *   sendingIpAddress?: ?string,
     *   sentAt?: ?DateTime,
     *   sesMessageId?: ?string,
     *   status?: ?value-of<EmailSendStatus>,
     *   subject?: ?string,
     *   subscriber?: ?EmailSendSubscriber,
     *   subscriberExternalId?: ?string,
     *   subscriberId?: ?string,
     *   suppressedAt?: ?DateTime,
     *   suppressionReason?: ?value-of<EmailSendSuppressionReason>,
     *   transactionalEmailId?: ?string,
     *   type?: ?value-of<EmailSendType>,
     *   unsubscribedAt?: ?DateTime,
     *   clicked?: ?bool,
     *   eventAt?: ?DateTime,
     *   opened?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTestVariantId = $values['abTestVariantId'] ?? null;
        $this->additionalRecipients = $values['additionalRecipients'] ?? null;
        $this->authenticatedDomainId = $values['authenticatedDomainId'] ?? null;
        $this->automation = $values['automation'] ?? null;
        $this->automationNodeId = $values['automationNodeId'] ?? null;
        $this->automationTokenId = $values['automationTokenId'] ?? null;
        $this->bouncedAt = $values['bouncedAt'] ?? null;
        $this->bounceSubType = $values['bounceSubType'] ?? null;
        $this->bounceType = $values['bounceType'] ?? null;
        $this->campaign = $values['campaign'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->clickedAt = $values['clickedAt'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->complainedAt = $values['complainedAt'] ?? null;
        $this->complaintType = $values['complaintType'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->deliveredAt = $values['deliveredAt'] ?? null;
        $this->emailBody = $values['emailBody'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->internalFailureCode = $values['internalFailureCode'] ?? null;
        $this->isCopiedRecipient = $values['isCopiedRecipient'] ?? null;
        $this->isTestEmail = $values['isTestEmail'] ?? null;
        $this->isTransactional = $values['isTransactional'] ?? null;
        $this->observedSendingIpAddress = $values['observedSendingIpAddress'] ?? null;
        $this->openedAt = $values['openedAt'] ?? null;
        $this->originalReplyTo = $values['originalReplyTo'] ?? null;
        $this->primaryEmailSendId = $values['primaryEmailSendId'] ?? null;
        $this->recipientEmail = $values['recipientEmail'] ?? null;
        $this->senderEmail = $values['senderEmail'] ?? null;
        $this->senderName = $values['senderName'] ?? null;
        $this->sendingIpAddress = $values['sendingIpAddress'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
        $this->sesMessageId = $values['sesMessageId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
        $this->subscriberExternalId = $values['subscriberExternalId'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->suppressedAt = $values['suppressedAt'] ?? null;
        $this->suppressionReason = $values['suppressionReason'] ?? null;
        $this->transactionalEmailId = $values['transactionalEmailId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->unsubscribedAt = $values['unsubscribedAt'] ?? null;
        $this->clicked = $values['clicked'] ?? null;
        $this->eventAt = $values['eventAt'] ?? null;
        $this->opened = $values['opened'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
