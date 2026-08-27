<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Threshold that applies at this send volume. Either bound may be null when the tier does not use it.
 */
class SenderHealthThresholdBound extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?float $rate
     */
    #[JsonProperty('rate')]
    public ?float $rate;

    /**
     * @param array{
     *   count?: ?int,
     *   rate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->rate = $values['rate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
