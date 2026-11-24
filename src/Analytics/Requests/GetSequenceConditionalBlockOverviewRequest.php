<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Analytics\Types\GetSequenceConditionalBlockOverviewRequestPeriod;

class GetSequenceConditionalBlockOverviewRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $end ISO 8601 end of custom send window (requires start)
     */
    public ?DateTime $end;

    /**
     * @var ?value-of<GetSequenceConditionalBlockOverviewRequestPeriod> $period Optional send time window. Defaults to all.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start ISO 8601 start of custom send window (requires end)
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   period?: ?value-of<GetSequenceConditionalBlockOverviewRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->end = $values['end'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
