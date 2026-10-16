<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Accounts\Types\ListAccountsRequestOrder;
use Sequenzy\Accounts\Types\ListAccountsRequestSort;
use Sequenzy\Accounts\Types\ListAccountsRequestWithoutEventRecipients;

class ListAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?value-of<ListAccountsRequestOrder> $order
     */
    public ?string $order;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?string $search
     */
    public ?string $search;

    /**
     * @var ?value-of<ListAccountsRequestSort> $sort
     */
    public ?string $sort;

    /**
     * @var ?value-of<ListAccountsRequestWithoutEventRecipients> $withoutEventRecipients When `true`, only accounts that have members but no owner or admin. Account events sent to owners or admins reach nobody in these accounts.
     */
    public ?string $withoutEventRecipients;

    /**
     * @param array{
     *   limit?: ?int,
     *   order?: ?value-of<ListAccountsRequestOrder>,
     *   page?: ?int,
     *   search?: ?string,
     *   sort?: ?value-of<ListAccountsRequestSort>,
     *   withoutEventRecipients?: ?value-of<ListAccountsRequestWithoutEventRecipients>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->withoutEventRecipients = $values['withoutEventRecipients'] ?? null;
    }
}
