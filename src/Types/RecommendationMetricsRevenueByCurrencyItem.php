<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RecommendationMetricsRevenueByCurrencyItem extends JsonSerializableType
{
    /**
     * @var ?string $currency ISO 4217 code or UNKNOWN.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?int $revenueCents Attributed revenue in this currency's minor units.
     */
    #[JsonProperty('revenueCents')]
    public ?int $revenueCents;

    /**
     * @param array{
     *   currency?: ?string,
     *   revenueCents?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currency = $values['currency'] ?? null;
        $this->revenueCents = $values['revenueCents'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
