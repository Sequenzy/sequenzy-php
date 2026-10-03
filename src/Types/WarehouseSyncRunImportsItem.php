<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class WarehouseSyncRunImportsItem extends JsonSerializableType
{
    /**
     * @var ?int $addedCount
     */
    #[JsonProperty('addedCount')]
    public ?int $addedCount;

    /**
     * @var ?int $failedCount
     */
    #[JsonProperty('failedCount')]
    public ?int $failedCount;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $processedCount
     */
    #[JsonProperty('processedCount')]
    public ?int $processedCount;

    /**
     * @var ?int $skippedCount
     */
    #[JsonProperty('skippedCount')]
    public ?int $skippedCount;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $totalRows
     */
    #[JsonProperty('totalRows')]
    public ?int $totalRows;

    /**
     * @var ?int $updatedCount
     */
    #[JsonProperty('updatedCount')]
    public ?int $updatedCount;

    /**
     * @param array{
     *   addedCount?: ?int,
     *   failedCount?: ?int,
     *   id?: ?string,
     *   processedCount?: ?int,
     *   skippedCount?: ?int,
     *   status?: ?string,
     *   totalRows?: ?int,
     *   updatedCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addedCount = $values['addedCount'] ?? null;
        $this->failedCount = $values['failedCount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->processedCount = $values['processedCount'] ?? null;
        $this->skippedCount = $values['skippedCount'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->totalRows = $values['totalRows'] ?? null;
        $this->updatedCount = $values['updatedCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
