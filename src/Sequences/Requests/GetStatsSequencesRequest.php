<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Sequences\Types\GetStatsSequencesRequestPeriod;

class GetStatsSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?value-of<GetStatsSequencesRequestPeriod> $period Sliding time window. Ignored when `start` and `end` are provided.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   period?: ?value-of<GetStatsSequencesRequestPeriod>,
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
