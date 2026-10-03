<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class ForwardMessageConversationsResponseForward extends JsonSerializableType
{
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
     * @var ?string $deliveryStatus
     */
    #[JsonProperty('deliveryStatus')]
    public ?string $deliveryStatus;

    /**
     * @var ?string $id ID of the system message that records the forward.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $messageId ID of the forwarded message.
     */
    #[JsonProperty('messageId')]
    public ?string $messageId;

    /**
     * @var ?string $to
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @param array{
     *   conversationId?: ?string,
     *   createdAt?: ?DateTime,
     *   deliveryStatus?: ?string,
     *   id?: ?string,
     *   messageId?: ?string,
     *   to?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversationId = $values['conversationId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->deliveryStatus = $values['deliveryStatus'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->messageId = $values['messageId'] ?? null;
        $this->to = $values['to'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
