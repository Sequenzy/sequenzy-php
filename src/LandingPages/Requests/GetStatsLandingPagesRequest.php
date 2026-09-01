<?php

namespace Sequenzy\LandingPages\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\LandingPages\Types\GetStatsLandingPagesRequestPeriod;

class GetStatsLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var ?string $end Custom range end as an ISO 8601 timestamp
     */
    public ?string $end;

    /**
     * @var ?bool $includeBots Include known crawlers in visit totals
     */
    public ?bool $includeBots;

    /**
     * @var ?value-of<GetStatsLandingPagesRequestPeriod> $period Time window. One of 7d, 30d, 90d, or all.
     */
    public ?string $period;

    /**
     * @var ?string $start Custom range start as an ISO 8601 timestamp
     */
    public ?string $start;

    /**
     * @param array{
     *   end?: ?string,
     *   includeBots?: ?bool,
     *   period?: ?value-of<GetStatsLandingPagesRequestPeriod>,
     *   start?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->end = $values['end'] ?? null;
        $this->includeBots = $values['includeBots'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
