<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * logic_wait_until. Longest wait. Omit or send null to wait until the contact matches.
 */
class SequencePathStepConfigTimeout extends JsonSerializableType
{
    /**
     * @var value-of<SequencePathStepConfigTimeoutUnit> $unit
     */
    #[JsonProperty('unit')]
    public string $unit;

    /**
     * @var int $value Whole number. The total can be at most 2 years.
     */
    #[JsonProperty('value')]
    public int $value;

    /**
     * @param array{
     *   unit: value-of<SequencePathStepConfigTimeoutUnit>,
     *   value: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->unit = $values['unit'];
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
