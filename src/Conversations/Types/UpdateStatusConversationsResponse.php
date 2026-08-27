<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateStatusConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?UpdateStatusConversationsResponseConversation $conversation
     */
    #[JsonProperty('conversation')]
    public ?UpdateStatusConversationsResponseConversation $conversation;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   conversation?: ?UpdateStatusConversationsResponseConversation,
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
