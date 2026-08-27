<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RecommendationMetricsTopProductsItem extends JsonSerializableType
{
    /**
     * @var ?int $clicks
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?int $impressions
     */
    #[JsonProperty('impressions')]
    public ?int $impressions;

    /**
     * @var ?string $provider Commerce provider (shopify, woocommerce, ...).
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $providerProductId Product ID in the provider's catalog.
     */
    #[JsonProperty('providerProductId')]
    public ?string $providerProductId;

    /**
     * @param array{
     *   clicks?: ?int,
     *   impressions?: ?int,
     *   provider?: ?string,
     *   providerProductId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
        $this->impressions = $values['impressions'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->providerProductId = $values['providerProductId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
