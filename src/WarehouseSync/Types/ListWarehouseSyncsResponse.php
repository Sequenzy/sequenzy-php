<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\WarehouseSync;
use Sequenzy\Core\Types\ArrayType;

class ListWarehouseSyncsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<WarehouseSync> $syncs
     */
    #[JsonProperty('syncs'), ArrayType([WarehouseSync::class])]
    public ?array $syncs;

    /**
     * @param array{
     *   success?: ?bool,
     *   syncs?: ?array<WarehouseSync>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->syncs = $values['syncs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
