<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class MarkUnreadConversationsResponseConversation extends JsonSerializableType
{
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
     * @param array{
     *   hasUnread?: ?bool,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->hasUnread = $values['hasUnread'] ?? null;
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
