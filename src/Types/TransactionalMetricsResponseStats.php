<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EngagementStats;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalMetricsResponseStats extends JsonSerializableType
{
    use EngagementStats;

    /**
     * @var ?float $complaintRate
     */
    #[JsonProperty('complaintRate')]
    public ?float $complaintRate;

    /**
     * @var ?int $complaints
     */
    #[JsonProperty('complaints')]
    public ?int $complaints;

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
     *   complaintRate?: ?float,
     *   complaints?: ?int,
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
        $this->complaintRate = $values['complaintRate'] ?? null;
        $this->complaints = $values['complaints'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
