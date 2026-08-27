<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CommerceValueForecastForecast extends JsonSerializableType
{
    /**
     * @var ?float $expectedOrders90Days
     */
    #[JsonProperty('expectedOrders90Days')]
    public ?float $expectedOrders90Days;

    /**
     * @var ?int $expectedRevenue90DaysCents
     */
    #[JsonProperty('expectedRevenue90DaysCents')]
    public ?int $expectedRevenue90DaysCents;

    /**
     * @var ?CommerceForecastRange $expectedRevenue90DaysRange
     */
    #[JsonProperty('expectedRevenue90DaysRange')]
    public ?CommerceForecastRange $expectedRevenue90DaysRange;

    /**
     * @var ?int $predictedAverageOrderValueCents
     */
    #[JsonProperty('predictedAverageOrderValueCents')]
    public ?int $predictedAverageOrderValueCents;

    /**
     * @var ?CommerceForecastRange $predictedAverageOrderValueRange
     */
    #[JsonProperty('predictedAverageOrderValueRange')]
    public ?CommerceForecastRange $predictedAverageOrderValueRange;

    /**
     * @var ?int $predictedCustomerValue365DaysCents
     */
    #[JsonProperty('predictedCustomerValue365DaysCents')]
    public ?int $predictedCustomerValue365DaysCents;

    /**
     * @var ?CommerceForecastRange $predictedCustomerValue365DaysRange
     */
    #[JsonProperty('predictedCustomerValue365DaysRange')]
    public ?CommerceForecastRange $predictedCustomerValue365DaysRange;

    /**
     * @param array{
     *   expectedOrders90Days?: ?float,
     *   expectedRevenue90DaysCents?: ?int,
     *   expectedRevenue90DaysRange?: ?CommerceForecastRange,
     *   predictedAverageOrderValueCents?: ?int,
     *   predictedAverageOrderValueRange?: ?CommerceForecastRange,
     *   predictedCustomerValue365DaysCents?: ?int,
     *   predictedCustomerValue365DaysRange?: ?CommerceForecastRange,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->expectedOrders90Days = $values['expectedOrders90Days'] ?? null;
        $this->expectedRevenue90DaysCents = $values['expectedRevenue90DaysCents'] ?? null;
        $this->expectedRevenue90DaysRange = $values['expectedRevenue90DaysRange'] ?? null;
        $this->predictedAverageOrderValueCents = $values['predictedAverageOrderValueCents'] ?? null;
        $this->predictedAverageOrderValueRange = $values['predictedAverageOrderValueRange'] ?? null;
        $this->predictedCustomerValue365DaysCents = $values['predictedCustomerValue365DaysCents'] ?? null;
        $this->predictedCustomerValue365DaysRange = $values['predictedCustomerValue365DaysRange'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
