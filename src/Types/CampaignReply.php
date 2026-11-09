<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * One reply to a campaign.
 */
class CampaignReply extends JsonSerializableType
{
    /**
     * @var int $attachmentCount
     */
    #[JsonProperty('attachmentCount')]
    public int $attachmentCount;

    /**
     * @var ?string $conversationId Inbox conversation holding the reply. Null when the reply has no inbox conversation.
     */
    #[JsonProperty('conversationId')]
    public ?string $conversationId;

    /**
     * @var ?string $email Null when the subscriber has since been deleted.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var string $emailSendId The campaign send the subscriber replied to.
     */
    #[JsonProperty('emailSendId')]
    public string $emailSendId;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var bool $hasAttachments
     */
    #[JsonProperty('hasAttachments')]
    public bool $hasAttachments;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var DateTime $receivedAt
     */
    #[JsonProperty('receivedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $receivedAt;

    /**
     * @var string $replyId
     */
    #[JsonProperty('replyId')]
    public string $replyId;

    /**
     * @var string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public string $subscriberId;

    /**
     * @param array{
     *   attachmentCount: int,
     *   emailSendId: string,
     *   hasAttachments: bool,
     *   receivedAt: DateTime,
     *   replyId: string,
     *   subscriberId: string,
     *   conversationId?: ?string,
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attachmentCount = $values['attachmentCount'];
        $this->conversationId = $values['conversationId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->emailSendId = $values['emailSendId'];
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->hasAttachments = $values['hasAttachments'];
        $this->lastName = $values['lastName'] ?? null;
        $this->receivedAt = $values['receivedAt'];
        $this->replyId = $values['replyId'];
        $this->subscriberId = $values['subscriberId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
