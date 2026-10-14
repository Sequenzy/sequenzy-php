<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class AccountHealthRunStats extends JsonSerializableType
{
    /**
     * @var ?AccountHealthPeriodStats $current
     */
    #[JsonProperty('current')]
    public ?AccountHealthPeriodStats $current;

    /**
     * @var ?int $periodDays
     */
    #[JsonProperty('periodDays')]
    public ?int $periodDays;

    /**
     * @var ?DateTime $periodEnd
     */
    #[JsonProperty('periodEnd'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $periodEnd;

    /**
     * @var ?DateTime $periodStart
     */
    #[JsonProperty('periodStart'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $periodStart;

    /**
     * @var ?AccountHealthPeriodStats $previous
     */
    #[JsonProperty('previous')]
    public ?AccountHealthPeriodStats $previous;

    /**
     * @param array{
     *   current?: ?AccountHealthPeriodStats,
     *   periodDays?: ?int,
     *   periodEnd?: ?DateTime,
     *   periodStart?: ?DateTime,
     *   previous?: ?AccountHealthPeriodStats,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->current = $values['current'] ?? null;
        $this->periodDays = $values['periodDays'] ?? null;
        $this->periodEnd = $values['periodEnd'] ?? null;
        $this->periodStart = $values['periodStart'] ?? null;
        $this->previous = $values['previous'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
