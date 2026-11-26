<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequencePathStepConfigConditionsItem extends JsonSerializableType
{
    /**
     * @var string $conditionType Same values as conditionType.
     */
    #[JsonProperty('conditionType')]
    public string $conditionType;

    /**
     * @param array{
     *   conditionType: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->conditionType = $values['conditionType'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
