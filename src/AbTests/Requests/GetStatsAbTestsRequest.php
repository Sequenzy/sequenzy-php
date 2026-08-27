<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\AbTests\Types\GetStatsAbTestsRequestPeriod;

class GetStatsAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $end Custom range end. Requires start.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?value-of<GetStatsAbTestsRequestPeriod> $period Optional period filter.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Custom range start. Requires end.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   period?: ?value-of<GetStatsAbTestsRequestPeriod>,
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
