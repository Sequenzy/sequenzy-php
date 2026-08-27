<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalMetricsResponseEngagementBreakdown extends JsonSerializableType
{
    /**
     * @var ?TransactionalMetricsResponseEngagementBreakdownHuman $human
     */
    #[JsonProperty('human')]
    public ?TransactionalMetricsResponseEngagementBreakdownHuman $human;

    /**
     * @var ?TransactionalMetricsResponseEngagementBreakdownMachine $machine
     */
    #[JsonProperty('machine')]
    public ?TransactionalMetricsResponseEngagementBreakdownMachine $machine;

    /**
     * @param array{
     *   human?: ?TransactionalMetricsResponseEngagementBreakdownHuman,
     *   machine?: ?TransactionalMetricsResponseEngagementBreakdownMachine,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->human = $values['human'] ?? null;
        $this->machine = $values['machine'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
