<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CampaignGoalMetrics extends JsonSerializableType
{
    /**
     * @var ?int $conversions
     */
    #[JsonProperty('conversions')]
    public ?int $conversions;

    /**
     * @var ?string $goalId
     */
    #[JsonProperty('goalId')]
    public ?string $goalId;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?float $trackedValue Tracked property total in minor units.
     */
    #[JsonProperty('trackedValue')]
    public ?float $trackedValue;

    /**
     * @param array{
     *   conversions?: ?int,
     *   goalId?: ?string,
     *   name?: ?string,
     *   trackedValue?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversions = $values['conversions'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->trackedValue = $values['trackedValue'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
