<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Conversations\Types\BulkUpdateStatusConversationsRequestStatus;

class BulkUpdateStatusConversationsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $conversationIds Conversation IDs to update, up to 100. Whitespace is trimmed and blank or repeated IDs are ignored; at least one non-blank ID is required.
     */
    #[JsonProperty('conversationIds'), ArrayType(['string'])]
    public array $conversationIds;

    /**
     * @var value-of<BulkUpdateStatusConversationsRequestStatus> $status New status for every listed conversation.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   conversationIds: array<string>,
     *   status: value-of<BulkUpdateStatusConversationsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conversationIds = $values['conversationIds'];
        $this->status = $values['status'];
    }
}
