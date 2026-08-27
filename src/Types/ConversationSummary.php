<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class ConversationSummary extends JsonSerializableType
{
    /**
     * @var ?ConversationSummaryContext $context
     */
    #[JsonProperty('context')]
    public ?ConversationSummaryContext $context;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?bool $hasUnread
     */
    #[JsonProperty('hasUnread')]
    public ?bool $hasUnread;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $lastMessageAt
     */
    #[JsonProperty('lastMessageAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastMessageAt;

    /**
     * @var ?string $lastMessageBy
     */
    #[JsonProperty('lastMessageBy')]
    public ?string $lastMessageBy;

    /**
     * @var ?int $messageCount
     */
    #[JsonProperty('messageCount')]
    public ?int $messageCount;

    /**
     * @var ?value-of<ConversationSummaryStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $subscriberEmail
     */
    #[JsonProperty('subscriberEmail')]
    public ?string $subscriberEmail;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?string $subscriberName
     */
    #[JsonProperty('subscriberName')]
    public ?string $subscriberName;

    /**
     * @param array{
     *   context?: ?ConversationSummaryContext,
     *   createdAt?: ?DateTime,
     *   hasUnread?: ?bool,
     *   id?: ?string,
     *   lastMessageAt?: ?DateTime,
     *   lastMessageBy?: ?string,
     *   messageCount?: ?int,
     *   status?: ?value-of<ConversationSummaryStatus>,
     *   subject?: ?string,
     *   subscriberEmail?: ?string,
     *   subscriberId?: ?string,
     *   subscriberName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->context = $values['context'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->hasUnread = $values['hasUnread'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastMessageAt = $values['lastMessageAt'] ?? null;
        $this->lastMessageBy = $values['lastMessageBy'] ?? null;
        $this->messageCount = $values['messageCount'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->subscriberEmail = $values['subscriberEmail'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->subscriberName = $values['subscriberName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
