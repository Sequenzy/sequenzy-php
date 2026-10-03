<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\WarehouseSync;

class RunWarehouseSyncResponse extends JsonSerializableType
{
    /**
     * @var ?bool $queued
     */
    #[JsonProperty('queued')]
    public ?bool $queued;

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
     *   queued?: ?bool,
     *   success?: ?bool,
     *   sync?: ?WarehouseSync,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->queued = $values['queued'] ?? null;
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
