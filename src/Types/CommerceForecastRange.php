<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CommerceForecastRange extends JsonSerializableType
{
    /**
     * @var ?int $highCents
     */
    #[JsonProperty('highCents')]
    public ?int $highCents;

    /**
     * @var ?int $lowCents
     */
    #[JsonProperty('lowCents')]
    public ?int $lowCents;

    /**
     * @param array{
     *   highCents?: ?int,
     *   lowCents?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->highCents = $values['highCents'] ?? null;
        $this->lowCents = $values['lowCents'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
