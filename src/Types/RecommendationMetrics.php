<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Product recommendation funnel for a campaign or sequence. Returned as a top-level `recommendations` object when recommendation blocks were rendered. The requested period or custom time range scopes impressions and clicks. Orders and revenue are attributed when a subscriber buys a recommended product within 7 days of a scoped click.
 */
class RecommendationMetrics extends JsonSerializableType
{
    /**
     * @var ?int $clickers Unique subscribers who clicked a recommendation.
     */
    #[JsonProperty('clickers')]
    public ?int $clickers;

    /**
     * @var ?int $clicks Recorded clicks on recommended products.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?int $impressions Total recommended products rendered across all sends.
     */
    #[JsonProperty('impressions')]
    public ?int $impressions;

    /**
     * @var ?int $orders Orders containing a clicked recommended product.
     */
    #[JsonProperty('orders')]
    public ?int $orders;

    /**
     * @var ?int $recipients Unique subscribers shown at least one recommendation.
     */
    #[JsonProperty('recipients')]
    public ?int $recipients;

    /**
     * @var ?array<RecommendationMetricsRevenueByCurrencyItem> $revenueByCurrency Currency-safe attributed revenue totals. UNKNOWN identifies orders whose source event omitted currency.
     */
    #[JsonProperty('revenueByCurrency'), ArrayType([RecommendationMetricsRevenueByCurrencyItem::class])]
    public ?array $revenueByCurrency;

    /**
     * @var ?int $revenueCents Legacy sum of attributed order minor units across currencies. Use revenueByCurrency for display or financial analysis.
     */
    #[JsonProperty('revenueCents')]
    public ?int $revenueCents;

    /**
     * @var ?array<RecommendationMetricsTopProductsItem> $topProducts Per-product impressions and clicks, most clicked first.
     */
    #[JsonProperty('topProducts'), ArrayType([RecommendationMetricsTopProductsItem::class])]
    public ?array $topProducts;

    /**
     * @param array{
     *   clickers?: ?int,
     *   clicks?: ?int,
     *   impressions?: ?int,
     *   orders?: ?int,
     *   recipients?: ?int,
     *   revenueByCurrency?: ?array<RecommendationMetricsRevenueByCurrencyItem>,
     *   revenueCents?: ?int,
     *   topProducts?: ?array<RecommendationMetricsTopProductsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickers = $values['clickers'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->impressions = $values['impressions'] ?? null;
        $this->orders = $values['orders'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->revenueByCurrency = $values['revenueByCurrency'] ?? null;
        $this->revenueCents = $values['revenueCents'] ?? null;
        $this->topProducts = $values['topProducts'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
