<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateWarehouseSyncRequestMappingAttributesItem extends JsonSerializableType
{
    /**
     * @var string $attribute
     */
    #[JsonProperty('attribute')]
    public string $attribute;

    /**
     * @var string $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * @param array{
     *   attribute: string,
     *   column: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attribute = $values['attribute'];
        $this->column = $values['column'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
