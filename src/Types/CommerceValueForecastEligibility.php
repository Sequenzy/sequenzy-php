<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CommerceValueForecastEligibility extends JsonSerializableType
{
    /**
     * @var ?array<CommerceValueForecastEligibilityReasonsItem> $reasons
     */
    #[JsonProperty('reasons'), ArrayType([CommerceValueForecastEligibilityReasonsItem::class])]
    public ?array $reasons;

    /**
     * @param array{
     *   reasons?: ?array<CommerceValueForecastEligibilityReasonsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->reasons = $values['reasons'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
