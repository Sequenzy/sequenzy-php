<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ConversationMessage;
use Sequenzy\Core\Json\JsonProperty;

class SendMessageConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?ConversationMessage $message
     */
    #[JsonProperty('message')]
    public ?ConversationMessage $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   message?: ?ConversationMessage,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
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
