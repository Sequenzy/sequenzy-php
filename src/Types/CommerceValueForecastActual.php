<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CommerceValueForecastActual extends JsonSerializableType
{
    /**
     * @var ?int $averageCustomerValueCents
     */
    #[JsonProperty('averageCustomerValueCents')]
    public ?int $averageCustomerValueCents;

    /**
     * @var ?int $averageOrderValueCents
     */
    #[JsonProperty('averageOrderValueCents')]
    public ?int $averageOrderValueCents;

    /**
     * @var ?float $repeatPurchaseRate
     */
    #[JsonProperty('repeatPurchaseRate')]
    public ?float $repeatPurchaseRate;

    /**
     * @param array{
     *   averageCustomerValueCents?: ?int,
     *   averageOrderValueCents?: ?int,
     *   repeatPurchaseRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->averageCustomerValueCents = $values['averageCustomerValueCents'] ?? null;
        $this->averageOrderValueCents = $values['averageOrderValueCents'] ?? null;
        $this->repeatPurchaseRate = $values['repeatPurchaseRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
