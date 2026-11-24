<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Campaigns\Types\GetConditionalBlockStatsAliasCampaignsRequestPeriod;

class GetConditionalBlockStatsAliasCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?string $abTestVariantId Optional A/B test variant ID
     */
    public ?string $abTestVariantId;

    /**
     * @var ?DateTime $end ISO 8601 window end (pair with start)
     */
    public ?DateTime $end;

    /**
     * @var ?string $goalId Optional goal ID or default-revenue
     */
    public ?string $goalId;

    /**
     * @var ?bool $includeMachineEngagement Include machine-classified opens and clicks
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?value-of<GetConditionalBlockStatsAliasCampaignsRequestPeriod> $period Send window (defaults to all for campaigns)
     */
    public ?string $period;

    /**
     * @var ?DateTime $start ISO 8601 window start (pair with end)
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   abTestVariantId?: ?string,
     *   end?: ?DateTime,
     *   goalId?: ?string,
     *   includeMachineEngagement?: ?bool,
     *   period?: ?value-of<GetConditionalBlockStatsAliasCampaignsRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTestVariantId = $values['abTestVariantId'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
