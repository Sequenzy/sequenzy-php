<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ConversationSummary;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\Pagination;

class ListConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ConversationSummary> $conversations
     */
    #[JsonProperty('conversations'), ArrayType([ConversationSummary::class])]
    public ?array $conversations;

    /**
     * @var ?Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?Pagination $pagination;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   conversations?: ?array<ConversationSummary>,
     *   pagination?: ?Pagination,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversations = $values['conversations'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
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
