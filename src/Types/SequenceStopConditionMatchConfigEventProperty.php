<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceStopConditionMatchConfigEventProperty extends JsonSerializableType
{
    /**
     * @var array<SequenceStopConditionMatchConfigEventPropertyRulesItem> $rules
     */
    #[JsonProperty('rules'), ArrayType([SequenceStopConditionMatchConfigEventPropertyRulesItem::class])]
    public array $rules;

    /**
     * @param array{
     *   rules: array<SequenceStopConditionMatchConfigEventPropertyRulesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rules = $values['rules'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
