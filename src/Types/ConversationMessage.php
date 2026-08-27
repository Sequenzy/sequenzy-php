<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class ConversationMessage extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $attachments
     */
    #[JsonProperty('attachments'), ArrayType([['string' => 'mixed']])]
    public ?array $attachments;

    /**
     * @var ?string $bodyHtml
     */
    #[JsonProperty('bodyHtml')]
    public ?string $bodyHtml;

    /**
     * @var ?string $bodyText
     */
    #[JsonProperty('bodyText')]
    public ?string $bodyText;

    /**
     * @var ?string $conversationId
     */
    #[JsonProperty('conversationId')]
    public ?string $conversationId;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $deliveryStatus pending, sent, or failed for outbound messages. Null for notes.
     */
    #[JsonProperty('deliveryStatus')]
    public ?string $deliveryStatus;

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
     * @var ?string $fromUserId
     */
    #[JsonProperty('fromUserId')]
    public ?string $fromUserId;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isRead
     */
    #[JsonProperty('isRead')]
    public ?bool $isRead;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?value-of<ConversationMessageType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   attachments?: ?array<array<string, mixed>>,
     *   bodyHtml?: ?string,
     *   bodyText?: ?string,
     *   conversationId?: ?string,
     *   createdAt?: ?DateTime,
     *   deliveryStatus?: ?string,
     *   fromEmail?: ?string,
     *   fromName?: ?string,
     *   fromUserId?: ?string,
     *   id?: ?string,
     *   isRead?: ?bool,
     *   subject?: ?string,
     *   type?: ?value-of<ConversationMessageType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attachments = $values['attachments'] ?? null;
        $this->bodyHtml = $values['bodyHtml'] ?? null;
        $this->bodyText = $values['bodyText'] ?? null;
        $this->conversationId = $values['conversationId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->deliveryStatus = $values['deliveryStatus'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->fromUserId = $values['fromUserId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isRead = $values['isRead'] ?? null;
        $this->subject = $values['subject'] ?? null;
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
