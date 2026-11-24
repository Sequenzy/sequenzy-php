<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Sequences\Types\GetOutcomesAliasSequencesRequestPeriod;

class GetOutcomesAliasSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?int $conversionWindowDays Conversion window in whole days after reaching the step. Truncated early if the contact re-enrolls at the same step.
     */
    public ?int $conversionWindowDays;

    /**
     * @var ?DateTime $end Custom ISO 8601 end time (requires start).
     */
    public ?DateTime $end;

    /**
     * @var ?string $eventName Custom event name to measure post-step conversion against. Mutually exclusive with goalId.
     */
    public ?string $eventName;

    /**
     * @var ?string $goalId Goal ID or default-revenue. Mutually exclusive with eventName.
     */
    public ?string $goalId;

    /**
     * @var ?string $nodeId Optional comma-separated node IDs to scope the response to.
     */
    public ?string $nodeId;

    /**
     * @var ?value-of<GetOutcomesAliasSequencesRequestPeriod> $period Rolling arrival window. Omit for all-time cohorts.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Custom ISO 8601 start time (requires end, max 90 days).
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   conversionWindowDays?: ?int,
     *   end?: ?DateTime,
     *   eventName?: ?string,
     *   goalId?: ?string,
     *   nodeId?: ?string,
     *   period?: ?value-of<GetOutcomesAliasSequencesRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversionWindowDays = $values['conversionWindowDays'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
