<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Analytics\Types\GetTransactionalMetricsLegacyRequestPeriod;

class GetTransactionalMetricsLegacyRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $end
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?value-of<GetTransactionalMetricsLegacyRequestPeriod> $period
     */
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   period?: ?value-of<GetTransactionalMetricsLegacyRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->end = $values['end'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
