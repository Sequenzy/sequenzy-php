<?php

namespace Sequenzy\Transactional\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Transactional\Types\GetTransactionalConditionalBlockStatsAliasRequestPeriod;

class GetTransactionalConditionalBlockStatsAliasRequest extends JsonSerializableType
{
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
     * @var ?value-of<GetTransactionalConditionalBlockStatsAliasRequestPeriod> $period
     */
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   goalId?: ?string,
     *   includeMachineEngagement?: ?bool,
     *   period?: ?value-of<GetTransactionalConditionalBlockStatsAliasRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->end = $values['end'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
