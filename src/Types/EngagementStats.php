<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Unified engagement metrics returned by analytics endpoints. When a period or start/end filter is applied these are a funnel over the sends made inside that window, not a log of events inside it: every delivery, engagement, and reply count is attributed to one of those sends, including activity that arrives after the window closes, so opened <= delivered <= sent always holds and no rate can exceed 100%. conversions and revenueCents are the exception and use the goal's own last-touch attribution window. Open and click metrics exclude detected scanner, preview, and tracked asset events unless includeMachineEngagement is true.
 */
class EngagementStats extends JsonSerializableType
{
    /**
     * @var ?int $bounced Unique bounces (deduplicated by email send)
     */
    #[JsonProperty('bounced')]
    public ?int $bounced;

    /**
     * @var ?float $bounceRate Percentage (0-100), calculated from sent emails
     */
    #[JsonProperty('bounceRate')]
    public ?float $bounceRate;

    /**
     * @var ?int $clicked Unique clicks (deduplicated by email send)
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @var ?float $clickRate Percentage (0-100), clicked / rateDenominator
     */
    #[JsonProperty('clickRate')]
    public ?float $clickRate;

    /**
     * @var ?int $conversions Attributed goal conversions (last-touch, 24h window). Only returned by campaign and sequence metrics endpoints.
     */
    #[JsonProperty('conversions')]
    public ?int $conversions;

    /**
     * @var ?int $delivered Capped at sent count
     */
    #[JsonProperty('delivered')]
    public ?int $delivered;

    /**
     * @var ?float $deliveryRate Percentage (0-100)
     */
    #[JsonProperty('deliveryRate')]
    public ?float $deliveryRate;

    /**
     * @var ?int $opened Unique opens (deduplicated by email send)
     */
    #[JsonProperty('opened')]
    public ?int $opened;

    /**
     * @var ?float $openRate Percentage (0-100), opened / rateDenominator
     */
    #[JsonProperty('openRate')]
    public ?float $openRate;

    /**
     * @var ?int $rateDenominator The number every engagement rate divides by: delivered, falling back to sent when no delivery events were recorded, and 0 when nothing was sent
     */
    #[JsonProperty('rateDenominator')]
    public ?int $rateDenominator;

    /**
     * @var ?value-of<EngagementStatsRateDenominatorBasis> $rateDenominatorBasis Which field rateDenominator was taken from
     */
    #[JsonProperty('rateDenominatorBasis')]
    public ?string $rateDenominatorBasis;

    /**
     * @var ?int $replies Inbound replies captured for delivered emails
     */
    #[JsonProperty('replies')]
    public ?int $replies;

    /**
     * @var ?float $replyRate Percentage (0-100), replies / rateDenominator
     */
    #[JsonProperty('replyRate')]
    public ?float $replyRate;

    /**
     * @var ?int $revenueCents Attributed revenue in cents from purchase events (saas.purchase and ecommerce.order_placed). Only returned by campaign and sequence metrics endpoints.
     */
    #[JsonProperty('revenueCents')]
    public ?int $revenueCents;

    /**
     * @var ?int $sent
     */
    #[JsonProperty('sent')]
    public ?int $sent;

    /**
     * @var ?int $unsubscribed
     */
    #[JsonProperty('unsubscribed')]
    public ?int $unsubscribed;

    /**
     * @var ?float $unsubscribeRate Percentage (0-100), unsubscribed / rateDenominator
     */
    #[JsonProperty('unsubscribeRate')]
    public ?float $unsubscribeRate;

    /**
     * @param array{
     *   bounced?: ?int,
     *   bounceRate?: ?float,
     *   clicked?: ?int,
     *   clickRate?: ?float,
     *   conversions?: ?int,
     *   delivered?: ?int,
     *   deliveryRate?: ?float,
     *   opened?: ?int,
     *   openRate?: ?float,
     *   rateDenominator?: ?int,
     *   rateDenominatorBasis?: ?value-of<EngagementStatsRateDenominatorBasis>,
     *   replies?: ?int,
     *   replyRate?: ?float,
     *   revenueCents?: ?int,
     *   sent?: ?int,
     *   unsubscribed?: ?int,
     *   unsubscribeRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounced = $values['bounced'] ?? null;
        $this->bounceRate = $values['bounceRate'] ?? null;
        $this->clicked = $values['clicked'] ?? null;
        $this->clickRate = $values['clickRate'] ?? null;
        $this->conversions = $values['conversions'] ?? null;
        $this->delivered = $values['delivered'] ?? null;
        $this->deliveryRate = $values['deliveryRate'] ?? null;
        $this->opened = $values['opened'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->rateDenominator = $values['rateDenominator'] ?? null;
        $this->rateDenominatorBasis = $values['rateDenominatorBasis'] ?? null;
        $this->replies = $values['replies'] ?? null;
        $this->replyRate = $values['replyRate'] ?? null;
        $this->revenueCents = $values['revenueCents'] ?? null;
        $this->sent = $values['sent'] ?? null;
        $this->unsubscribed = $values['unsubscribed'] ?? null;
        $this->unsubscribeRate = $values['unsubscribeRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
