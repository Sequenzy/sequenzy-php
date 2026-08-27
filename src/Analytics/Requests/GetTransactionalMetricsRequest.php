<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Analytics\Types\GetTransactionalMetricsRequestPeriod;

class GetTransactionalMetricsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $end Custom range end. Must be used with start; maximum 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?value-of<GetTransactionalMetricsRequestPeriod> $period Optional sliding time window. Ignored when start/end are provided.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Custom range start. Must be used with end.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   period?: ?value-of<GetTransactionalMetricsRequestPeriod>,
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
