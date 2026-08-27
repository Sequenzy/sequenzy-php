<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\EmailSendAdditionalRecipients;
use Sequenzy\Types\EmailSendAutomation;
use DateTime;
use Sequenzy\Types\EmailSendCampaign;
use Sequenzy\Types\EmailSendEmailType;
use Sequenzy\Types\EmailSendInternalFailureCode;
use Sequenzy\Types\EmailSendStatus;
use Sequenzy\Types\EmailSendSubscriber;
use Sequenzy\Types\EmailSendSuppressionReason;
use Sequenzy\Types\EmailSendType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

/**
 * @property ?string $abTestVariantId
 * @property ?EmailSendAdditionalRecipients $additionalRecipients
 * @property ?string $authenticatedDomainId
 * @property ?EmailSendAutomation $automation
 * @property ?string $automationNodeId
 * @property ?string $automationTokenId
 * @property ?DateTime $bouncedAt
 * @property ?string $bounceSubType
 * @property ?string $bounceType
 * @property ?EmailSendCampaign $campaign
 * @property ?string $campaignId
 * @property ?DateTime $clickedAt
 * @property ?string $companyId
 * @property ?DateTime $complainedAt
 * @property ?string $complaintType
 * @property ?DateTime $createdAt
 * @property ?DateTime $deliveredAt
 * @property ?string $emailBody
 * @property ?value-of<EmailSendEmailType> $emailType
 * @property ?string $errorMessage
 * @property ?string $id
 * @property ?value-of<EmailSendInternalFailureCode> $internalFailureCode
 * @property ?bool $isCopiedRecipient
 * @property ?bool $isTestEmail
 * @property ?bool $isTransactional
 * @property ?string $observedSendingIpAddress
 * @property ?DateTime $openedAt
 * @property ?string $originalReplyTo
 * @property ?string $primaryEmailSendId
 * @property ?string $recipientEmail
 * @property ?string $senderEmail
 * @property ?string $senderName
 * @property ?string $sendingIpAddress
 * @property ?DateTime $sentAt
 * @property ?string $sesMessageId
 * @property ?value-of<EmailSendStatus> $status
 * @property ?string $subject
 * @property ?EmailSendSubscriber $subscriber
 * @property ?string $subscriberExternalId
 * @property ?string $subscriberId
 * @property ?DateTime $suppressedAt
 * @property ?value-of<EmailSendSuppressionReason> $suppressionReason
 * @property ?string $transactionalEmailId
 * @property ?value-of<EmailSendType> $type
 * @property ?DateTime $unsubscribedAt
 */
trait EmailSend
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
}
