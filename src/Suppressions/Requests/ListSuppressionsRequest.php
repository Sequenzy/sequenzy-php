<?php

namespace Sequenzy\Suppressions\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Suppressions\Types\ListSuppressionsRequestOrder;
use Sequenzy\Suppressions\Types\ListSuppressionsRequestSort;

class ListSuppressionsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Entries per page (max 100).
     */
    public ?int $limit;

    /**
     * @var ?value-of<ListSuppressionsRequestOrder> $order Sort direction. Defaults to `desc` for `suppressedAt` and `status`, `asc` for `email`.
     */
    public ?string $order;

    /**
     * @var ?int $page 1-based page number.
     */
    public ?int $page;

    /**
     * @var ?string $search Case-insensitive substring filter on the recipient email address.
     */
    public ?string $search;

    /**
     * Field to order by. `status` lists removable workspace escalations before protected
     * suppressions. An unrecognized value falls back to `suppressedAt` rather than failing the
     * request - read `sortBy` in the response to confirm what was applied.
     *
     * @var ?value-of<ListSuppressionsRequestSort> $sort
     */
    public ?string $sort;

    /**
     * @param array{
     *   limit?: ?int,
     *   order?: ?value-of<ListSuppressionsRequestOrder>,
     *   page?: ?int,
     *   search?: ?string,
     *   sort?: ?value-of<ListSuppressionsRequestSort>,
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
