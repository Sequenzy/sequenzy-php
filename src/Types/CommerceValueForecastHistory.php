<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CommerceValueForecastHistory extends JsonSerializableType
{
    /**
     * @var ?int $customerCount
     */
    #[JsonProperty('customerCount')]
    public ?int $customerCount;

    /**
     * @var ?int $daysSinceLastOrder
     */
    #[JsonProperty('daysSinceLastOrder')]
    public ?int $daysSinceLastOrder;

    /**
     * @var ?int $excludedCurrencyOrderCount
     */
    #[JsonProperty('excludedCurrencyOrderCount')]
    public ?int $excludedCurrencyOrderCount;

    /**
     * @var ?int $historyDays
     */
    #[JsonProperty('historyDays')]
    public ?int $historyDays;

    /**
     * @var ?int $orderCount
     */
    #[JsonProperty('orderCount')]
    public ?int $orderCount;

    /**
     * @var ?int $repeatCustomerCount
     */
    #[JsonProperty('repeatCustomerCount')]
    public ?int $repeatCustomerCount;

    /**
     * @param array{
     *   customerCount?: ?int,
     *   daysSinceLastOrder?: ?int,
     *   excludedCurrencyOrderCount?: ?int,
     *   historyDays?: ?int,
     *   orderCount?: ?int,
     *   repeatCustomerCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerCount = $values['customerCount'] ?? null;
        $this->daysSinceLastOrder = $values['daysSinceLastOrder'] ?? null;
        $this->excludedCurrencyOrderCount = $values['excludedCurrencyOrderCount'] ?? null;
        $this->historyDays = $values['historyDays'] ?? null;
        $this->orderCount = $values['orderCount'] ?? null;
        $this->repeatCustomerCount = $values['repeatCustomerCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
