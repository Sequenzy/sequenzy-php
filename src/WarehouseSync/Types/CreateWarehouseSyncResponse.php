<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\WarehouseSync;

class CreateWarehouseSyncResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?WarehouseSync $sync
     */
    #[JsonProperty('sync')]
    public ?WarehouseSync $sync;

    /**
     * @param array{
     *   success?: ?bool,
     *   sync?: ?WarehouseSync,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->sync = $values['sync'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
