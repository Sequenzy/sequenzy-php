<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $conversation Conversation with messages, context, and subscriber.
     */
    #[JsonProperty('conversation'), ArrayType(['string' => 'mixed'])]
    public ?array $conversation;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   conversation?: ?array<string, mixed>,
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
