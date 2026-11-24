<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Analytics\Types\GetSequenceStepConditionalBlockStatsRequestPeriod;

class GetSequenceStepConditionalBlockStatsRequest extends JsonSerializableType
{
    /**
     * @var ?string $abTestVariantId
     */
    public ?string $abTestVariantId;

    /**
     * @var ?DateTime $end
     */
    public ?DateTime $end;

    /**
     * @var ?string $goalId
     */
    public ?string $goalId;

    /**
     * @var ?bool $includeMachineEngagement
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?value-of<GetSequenceStepConditionalBlockStatsRequestPeriod> $period
     */
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   abTestVariantId?: ?string,
     *   end?: ?DateTime,
     *   goalId?: ?string,
     *   includeMachineEngagement?: ?bool,
     *   period?: ?value-of<GetSequenceStepConditionalBlockStatsRequestPeriod>,
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
