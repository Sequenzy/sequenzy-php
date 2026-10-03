<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RunWarehouseSyncRequest extends JsonSerializableType
{
    /**
     * @var ?bool $fullResync
     */
    #[JsonProperty('fullResync')]
    public ?bool $fullResync;

    /**
     * @param array{
     *   fullResync?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fullResync = $values['fullResync'] ?? null;
    }
}
