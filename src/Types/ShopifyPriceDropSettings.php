<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ShopifyPriceDropSettings extends JsonSerializableType
{
    /**
     * @var ?float $cooldownDays Minimum days between price-drop events per subscriber and product (default 7, max 90).
     */
    #[JsonProperty('cooldownDays')]
    public ?float $cooldownDays;

    /**
     * @var ?bool $enabled Whether price-drop events fire for this store (default true).
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?float $lookbackDays How many days back product viewers qualify as the audience (default 30, max 90).
     */
    #[JsonProperty('lookbackDays')]
    public ?float $lookbackDays;

    /**
     * @var ?float $minPercent Minimum price decrease percent to alert on (default 5, max 95).
     */
    #[JsonProperty('minPercent')]
    public ?float $minPercent;

    /**
     * @param array{
     *   cooldownDays?: ?float,
     *   enabled?: ?bool,
     *   lookbackDays?: ?float,
     *   minPercent?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cooldownDays = $values['cooldownDays'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->lookbackDays = $values['lookbackDays'] ?? null;
        $this->minPercent = $values['minPercent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
