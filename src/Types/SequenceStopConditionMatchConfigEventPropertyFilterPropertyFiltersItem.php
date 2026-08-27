<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceStopConditionMatchConfigEventPropertyFilterPropertyFiltersItem extends JsonSerializableType
{
    /**
     * @var value-of<SequenceStopConditionMatchConfigEventPropertyFilterPropertyFiltersItemOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var string $path Dot-path into the stop event's properties.
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @var mixed $value Comparison value (string, number, or boolean; array of values for one_of). Omit for exists/not_exists.
     */
    #[JsonProperty('value')]
    public mixed $value;

    /**
     * @param array{
     *   operator: value-of<SequenceStopConditionMatchConfigEventPropertyFilterPropertyFiltersItemOperator>,
     *   path: string,
     *   value?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->operator = $values['operator'];
        $this->path = $values['path'];
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
