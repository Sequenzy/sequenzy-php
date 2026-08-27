<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceStopConditionMatchConfigFieldValue extends JsonSerializableType
{
    /**
     * @var value-of<SequenceStopConditionMatchConfigFieldValueOperator> $operator
     */
    #[JsonProperty('operator')]
    public string $operator;

    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   operator: value-of<SequenceStopConditionMatchConfigFieldValueOperator>,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->operator = $values['operator'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
