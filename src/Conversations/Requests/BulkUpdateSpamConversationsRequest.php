<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class BulkUpdateSpamConversationsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $conversationIds Conversation IDs to move, up to 100. Whitespace is trimmed and blank or repeated IDs are ignored; at least one non-blank ID is required.
     */
    #[JsonProperty('conversationIds'), ArrayType(['string'])]
    public array $conversationIds;

    /**
     * @var bool $spam True moves them to Spam; false moves them back.
     */
    #[JsonProperty('spam')]
    public bool $spam;

    /**
     * @param array{
     *   conversationIds: array<string>,
     *   spam: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationIds = $values['conversationIds'];
        $this->spam = $values['spam'];
    }
}
