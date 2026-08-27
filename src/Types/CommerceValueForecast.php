<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Explainable commerce forecast derived from up to two years of provider-neutral placed-order events.
 */
class CommerceValueForecast extends JsonSerializableType
{
    /**
     * @var ?CommerceValueForecastActual $actual
     */
    #[JsonProperty('actual')]
    public ?CommerceValueForecastActual $actual;

    /**
     * @var ?value-of<CommerceValueForecastConfidence> $confidence
     */
    #[JsonProperty('confidence')]
    public ?string $confidence;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?CommerceValueForecastEligibility $eligibility
     */
    #[JsonProperty('eligibility')]
    public ?CommerceValueForecastEligibility $eligibility;

    /**
     * @var ?CommerceValueForecastForecast $forecast
     */
    #[JsonProperty('forecast')]
    public ?CommerceValueForecastForecast $forecast;

    /**
     * @var ?DateTime $generatedAt
     */
    #[JsonProperty('generatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $generatedAt;

    /**
     * @var ?CommerceValueForecastHistory $history
     */
    #[JsonProperty('history')]
    public ?CommerceValueForecastHistory $history;

    /**
     * @var ?bool $isSampled
     */
    #[JsonProperty('isSampled')]
    public ?bool $isSampled;

    /**
     * @var ?string $modelVersion
     */
    #[JsonProperty('modelVersion')]
    public ?string $modelVersion;

    /**
     * @var ?value-of<CommerceValueForecastStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   actual?: ?CommerceValueForecastActual,
     *   confidence?: ?value-of<CommerceValueForecastConfidence>,
     *   currency?: ?string,
     *   eligibility?: ?CommerceValueForecastEligibility,
     *   forecast?: ?CommerceValueForecastForecast,
     *   generatedAt?: ?DateTime,
     *   history?: ?CommerceValueForecastHistory,
     *   isSampled?: ?bool,
     *   modelVersion?: ?string,
     *   status?: ?value-of<CommerceValueForecastStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->actual = $values['actual'] ?? null;
        $this->confidence = $values['confidence'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->eligibility = $values['eligibility'] ?? null;
        $this->forecast = $values['forecast'] ?? null;
        $this->generatedAt = $values['generatedAt'] ?? null;
        $this->history = $values['history'] ?? null;
        $this->isSampled = $values['isSampled'] ?? null;
        $this->modelVersion = $values['modelVersion'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
