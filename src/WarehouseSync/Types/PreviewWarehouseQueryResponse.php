<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PreviewWarehouseQueryResponse extends JsonSerializableType
{
    /**
     * @var ?array<PreviewWarehouseQueryResponseColumnsItem> $columns
     */
    #[JsonProperty('columns'), ArrayType([PreviewWarehouseQueryResponseColumnsItem::class])]
    public ?array $columns;

    /**
     * @var ?array<array<string, mixed>> $rows
     */
    #[JsonProperty('rows'), ArrayType([['string' => 'mixed']])]
    public ?array $rows;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   columns?: ?array<PreviewWarehouseQueryResponseColumnsItem>,
     *   rows?: ?array<array<string, mixed>>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->columns = $values['columns'] ?? null;
        $this->rows = $values['rows'] ?? null;
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
