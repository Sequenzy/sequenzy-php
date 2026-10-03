<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\WarehouseSyncRun;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListWarehouseSyncRunsResponse extends JsonSerializableType
{
    /**
     * @var ?array<WarehouseSyncRun> $runs
     */
    #[JsonProperty('runs'), ArrayType([WarehouseSyncRun::class])]
    public ?array $runs;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   runs?: ?array<WarehouseSyncRun>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->runs = $values['runs'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
