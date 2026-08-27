<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SenderHealthMetric extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?SenderHealthThresholdBound $pauseThreshold
     */
    #[JsonProperty('pauseThreshold')]
    public ?SenderHealthThresholdBound $pauseThreshold;

    /**
     * @var ?float $rate Percentage of the applicable bounceScopedSent or complaintScopedSent denominator.
     */
    #[JsonProperty('rate')]
    public ?float $rate;

    /**
     * @var ?SenderHealthThresholdBound $warnThreshold
     */
    #[JsonProperty('warnThreshold')]
    public ?SenderHealthThresholdBound $warnThreshold;

    /**
     * @param array{
     *   count?: ?int,
     *   pauseThreshold?: ?SenderHealthThresholdBound,
     *   rate?: ?float,
     *   warnThreshold?: ?SenderHealthThresholdBound,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->pauseThreshold = $values['pauseThreshold'] ?? null;
        $this->rate = $values['rate'] ?? null;
        $this->warnThreshold = $values['warnThreshold'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
