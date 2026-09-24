<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Accounts\Types\ListAccountsRequestOrder;
use Sequenzy\Accounts\Types\ListAccountsRequestSort;

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
     * @param array{
     *   limit?: ?int,
     *   order?: ?value-of<ListAccountsRequestOrder>,
     *   page?: ?int,
     *   search?: ?string,
     *   sort?: ?value-of<ListAccountsRequestSort>,
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
    }
}
