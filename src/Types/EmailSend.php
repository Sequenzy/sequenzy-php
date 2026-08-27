<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class EmailSend extends JsonSerializableType
{
    /**
     * @var ?string $abTestVariantId
     */
    #[JsonProperty('abTestVariantId')]
    public ?string $abTestVariantId;

    /**
     * @var ?EmailSendAdditionalRecipients $additionalRecipients Full recipient envelope for multi-recipient transactional sends, as actually sent. Null for single-recipient sends.
     */
    #[JsonProperty('additionalRecipients')]
    public ?EmailSendAdditionalRecipients $additionalRecipients;

    /**
     * @var ?string $authenticatedDomainId
     */
    #[JsonProperty('authenticatedDomainId')]
    public ?string $authenticatedDomainId;

    /**
     * @var ?EmailSendAutomation $automation
     */
    #[JsonProperty('automation')]
    public ?EmailSendAutomation $automation;

    /**
     * @var ?string $automationNodeId
     */
    #[JsonProperty('automationNodeId')]
    public ?string $automationNodeId;

    /**
     * @var ?string $automationTokenId
     */
    #[JsonProperty('automationTokenId')]
    public ?string $automationTokenId;

    /**
     * @var ?DateTime $bouncedAt
     */
    #[JsonProperty('bouncedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $bouncedAt;

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
     * @var ?EmailSendCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?EmailSendCampaign $campaign;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?DateTime $clickedAt
     */
    #[JsonProperty('clickedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $clickedAt;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?DateTime $complainedAt
     */
    #[JsonProperty('complainedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $complainedAt;

    /**
     * @var ?string $complaintType
     */
    #[JsonProperty('complaintType')]
    public ?string $complaintType;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $deliveredAt
     */
    #[JsonProperty('deliveredAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deliveredAt;

    /**
     * @var ?string $emailBody Stored HTML body. Null when the email send row has been cleaned up.
     */
    #[JsonProperty('emailBody')]
    public ?string $emailBody;

    /**
     * @var ?value-of<EmailSendEmailType> $emailType Delivery policy used for suppression and compliance behavior, or null when retained legacy data cannot prove it.
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var ?string $errorMessage
     */
    #[JsonProperty('errorMessage')]
    public ?string $errorMessage;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<EmailSendInternalFailureCode> $internalFailureCode Why a send reached status "failed". Present only for terminal delivery failures. "transport_exhausted" means every available delivery route was refused by the recipient provider; "admin_bounce" means an operator removed the message from the delivery queue; "crash_orphaned_claim" means the sending worker stopped between claiming the send and recording a transport outcome, so the message was never confirmed as reaching the provider. None of them is a bounce: the address is still valid, stays subscribed, and is not suppressed. New codes can be added over time, so treat an unrecognized value as a generic failure rather than rejecting the response.
     */
    #[JsonProperty('internalFailureCode')]
    public ?string $internalFailureCode;

    /**
     * @var ?bool $isCopiedRecipient Whether this is an auxiliary CC/BCC delivery record whose content and engagement belong to a primary email send.
     */
    #[JsonProperty('isCopiedRecipient')]
    public ?bool $isCopiedRecipient;

    /**
     * @var ?bool $isTestEmail Whether this delivery was a test send hidden from normal sent-email history.
     */
    #[JsonProperty('isTestEmail')]
    public ?bool $isTestEmail;

    /**
     * @var ?bool $isTransactional Stored delivery-policy snapshot. Prefer emailType for a normalized value.
     */
    #[JsonProperty('isTransactional')]
    public ?bool $isTransactional;

    /**
     * @var ?string $observedSendingIpAddress
     */
    #[JsonProperty('observedSendingIpAddress')]
    public ?string $observedSendingIpAddress;

    /**
     * @var ?DateTime $openedAt
     */
    #[JsonProperty('openedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $openedAt;

    /**
     * @var ?string $originalReplyTo Resolved reply destination, optionally including a display name. When reply tracking is disabled, this is the sent Reply-To header. When reply tracking is enabled, the sent header is a unique trackable address and this value is the forwarding destination.
     */
    #[JsonProperty('originalReplyTo')]
    public ?string $originalReplyTo;

    /**
     * @var ?string $primaryEmailSendId Primary email send ID for a copied-recipient delivery, or null for ordinary sends and when the primary record is unavailable.
     */
    #[JsonProperty('primaryEmailSendId')]
    public ?string $primaryEmailSendId;

    /**
     * @var ?string $recipientEmail
     */
    #[JsonProperty('recipientEmail')]
    public ?string $recipientEmail;

    /**
     * @var ?string $senderEmail
     */
    #[JsonProperty('senderEmail')]
    public ?string $senderEmail;

    /**
     * @var ?string $senderName
     */
    #[JsonProperty('senderName')]
    public ?string $senderName;

    /**
     * @var ?string $sendingIpAddress
     */
    #[JsonProperty('sendingIpAddress')]
    public ?string $sendingIpAddress;

    /**
     * @var ?DateTime $sentAt
     */
    #[JsonProperty('sentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sentAt;

    /**
     * @var ?string $sesMessageId
     */
    #[JsonProperty('sesMessageId')]
    public ?string $sesMessageId;

    /**
     * @var ?value-of<EmailSendStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?EmailSendSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?EmailSendSubscriber $subscriber;

    /**
     * @var ?string $subscriberExternalId Customer-owned subscriber ID captured from a single-recipient transactional send.
     */
    #[JsonProperty('subscriberExternalId')]
    public ?string $subscriberExternalId;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?DateTime $suppressedAt
     */
    #[JsonProperty('suppressedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $suppressedAt;

    /**
     * @var ?value-of<EmailSendSuppressionReason> $suppressionReason
     */
    #[JsonProperty('suppressionReason')]
    public ?string $suppressionReason;

    /**
     * @var ?string $transactionalEmailId
     */
    #[JsonProperty('transactionalEmailId')]
    public ?string $transactionalEmailId;

    /**
     * @var ?value-of<EmailSendType> $type Send-source category. API/MCP sends use transactional here even when their delivery policy is marketing.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DateTime $unsubscribedAt
     */
    #[JsonProperty('unsubscribedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $unsubscribedAt;

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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
