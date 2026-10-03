<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListWarehouseSyncRunsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @param array{
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
