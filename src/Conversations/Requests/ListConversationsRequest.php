<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Conversations\Types\ListConversationsRequestSpam;
use Sequenzy\Conversations\Types\ListConversationsRequestStatus;
use Sequenzy\Conversations\Types\ListConversationsRequestUnread;

class ListConversationsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Results per page.
     */
    public ?int $limit;

    /**
     * @var ?int $page Page number.
     */
    public ?int $page;

    /**
     * @var ?string $recipient Only conversations that started at this inbox address. Case does not matter. See List conversation recipients.
     */
    public ?string $recipient;

    /**
     * @var ?string $search Search in subject, subscriber email, or subscriber name.
     */
    public ?string $search;

    /**
     * @var ?value-of<ListConversationsRequestSpam> $spam Pass "true" to list the Spam folder instead. Other lists leave spam out.
     */
    public ?string $spam;

    /**
     * @var ?value-of<ListConversationsRequestStatus> $status Filter by conversation status.
     */
    public ?string $status;

    /**
     * @var ?value-of<ListConversationsRequestUnread> $unread Pass "true" to only return conversations with unread messages.
     */
    public ?string $unread;

    /**
     * @param array{
     *   limit?: ?int,
     *   page?: ?int,
     *   recipient?: ?string,
     *   search?: ?string,
     *   spam?: ?value-of<ListConversationsRequestSpam>,
     *   status?: ?value-of<ListConversationsRequestStatus>,
     *   unread?: ?value-of<ListConversationsRequestUnread>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->recipient = $values['recipient'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->spam = $values['spam'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->unread = $values['unread'] ?? null;
    }
}
