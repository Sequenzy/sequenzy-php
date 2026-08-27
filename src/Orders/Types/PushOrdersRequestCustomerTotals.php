<?php

namespace Sequenzy\Orders\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Authoritative customer aggregates from your platform. When provided, these override Sequenzy's additive revenue bookkeeping.
 */
class PushOrdersRequestCustomerTotals extends JsonSerializableType
{
    /**
     * @var ?int $ordersCount
     */
    #[JsonProperty('ordersCount')]
    public ?int $ordersCount;

    /**
     * @var ?int $totalSpentCents
     */
    #[JsonProperty('totalSpentCents')]
    public ?int $totalSpentCents;

    /**
     * @param array{
     *   ordersCount?: ?int,
     *   totalSpentCents?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->ordersCount = $values['ordersCount'] ?? null;
        $this->totalSpentCents = $values['totalSpentCents'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
