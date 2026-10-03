<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListWarehouseSyncsRequest extends JsonSerializableType
{
    /**
     * @var ?string $connectionId
     */
    public ?string $connectionId;

    /**
     * @param array{
     *   connectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->connectionId = $values['connectionId'] ?? null;
    }
}
