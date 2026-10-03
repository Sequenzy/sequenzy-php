<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateWarehouseSyncRequestMappingPropertiesItem extends JsonSerializableType
{
    /**
     * @var string $column
     */
    #[JsonProperty('column')]
    public string $column;

    /**
     * @var string $property
     */
    #[JsonProperty('property')]
    public string $property;

    /**
     * @param array{
     *   column: string,
     *   property: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->column = $values['column'];
        $this->property = $values['property'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
