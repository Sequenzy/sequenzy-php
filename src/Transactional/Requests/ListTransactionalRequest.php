<?php

namespace Sequenzy\Transactional\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Transactional\Types\ListTransactionalRequestOrder;
use Sequenzy\Transactional\Types\ListTransactionalRequestSort;
use Sequenzy\Transactional\Types\ListTransactionalRequestStatus;

class ListTransactionalRequest extends JsonSerializableType
{
    /**
     * @var ?bool $includeMachineEngagement Include detected bot, scanner, preview, and privacy-proxy engagement in open and click metrics.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?value-of<ListTransactionalRequestOrder> $order Sort direction.
     */
    public ?string $order;

    /**
     * @var ?string $search Case-insensitive search across template name, API slug, and linked email subject/title.
     */
    public ?string $search;

    /**
     * @var ?value-of<ListTransactionalRequestSort> $sort Sort by creation date or all-time engagement metrics.
     */
    public ?string $sort;

    /**
     * @var ?value-of<ListTransactionalRequestStatus> $status Filter by template active state.
     */
    public ?string $status;

    /**
     * @param array{
     *   includeMachineEngagement?: ?bool,
     *   order?: ?value-of<ListTransactionalRequestOrder>,
     *   search?: ?string,
     *   sort?: ?value-of<ListTransactionalRequestSort>,
     *   status?: ?value-of<ListTransactionalRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
