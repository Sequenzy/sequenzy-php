<?php

namespace Sequenzy\AbTests\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when the test is judged on a goal or event. Covers every send of the test, whatever the requested period.
 */
class GetStatsAbTestsResponseVariantsItemOutcome extends JsonSerializableType
{
    /**
     * @var ?float $conversionRate convertedRecipients per delivered email, as a percentage.
     */
    #[JsonProperty('conversionRate')]
    public ?float $conversionRate;

    /**
     * @var ?int $convertedRecipients Recipients with an attributed goal conversion, or who fired the event after their send.
     */
    #[JsonProperty('convertedRecipients')]
    public ?int $convertedRecipients;

    /**
     * @var ?int $deliveries
     */
    #[JsonProperty('deliveries')]
    public ?int $deliveries;

    /**
     * @var ?float $value Summed tracked goal value, such as revenue in cents. Refunds lower it. 0 for events.
     */
    #[JsonProperty('value')]
    public ?float $value;

    /**
     * @var ?float $valuePerDelivery
     */
    #[JsonProperty('valuePerDelivery')]
    public ?float $valuePerDelivery;

    /**
     * @param array{
     *   conversionRate?: ?float,
     *   convertedRecipients?: ?int,
     *   deliveries?: ?int,
     *   value?: ?float,
     *   valuePerDelivery?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conversionRate = $values['conversionRate'] ?? null;
        $this->convertedRecipients = $values['convertedRecipients'] ?? null;
        $this->deliveries = $values['deliveries'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->valuePerDelivery = $values['valuePerDelivery'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
