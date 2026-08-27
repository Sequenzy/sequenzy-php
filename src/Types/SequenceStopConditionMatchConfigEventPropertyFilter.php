<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceStopConditionMatchConfigEventPropertyFilter extends JsonSerializableType
{
    /**
     * @var array<SequenceStopConditionMatchConfigEventPropertyFilterPropertyFiltersItem> $propertyFilters Filters an event received after enrollment must all match for the stop to fire. Same shape as event trigger propertyFilters.
     */
    #[JsonProperty('propertyFilters'), ArrayType([SequenceStopConditionMatchConfigEventPropertyFilterPropertyFiltersItem::class])]
    public array $propertyFilters;

    /**
     * @param array{
     *   propertyFilters: array<SequenceStopConditionMatchConfigEventPropertyFilterPropertyFiltersItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->propertyFilters = $values['propertyFilters'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
