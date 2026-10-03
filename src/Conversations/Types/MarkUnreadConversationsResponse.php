<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class MarkUnreadConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?MarkUnreadConversationsResponseConversation $conversation
     */
    #[JsonProperty('conversation')]
    public ?MarkUnreadConversationsResponseConversation $conversation;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   conversation?: ?MarkUnreadConversationsResponseConversation,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversation = $values['conversation'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
