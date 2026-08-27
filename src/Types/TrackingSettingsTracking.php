<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TrackingSettingsTracking extends JsonSerializableType
{
    /**
     * @var ?bool $clickTrackingEnabled
     */
    #[JsonProperty('clickTrackingEnabled')]
    public ?bool $clickTrackingEnabled;

    /**
     * @var ?int $defaultAttributionWindowHours
     */
    #[JsonProperty('defaultAttributionWindowHours')]
    public ?int $defaultAttributionWindowHours;

    /**
     * @var ?bool $openTrackingEnabled
     */
    #[JsonProperty('openTrackingEnabled')]
    public ?bool $openTrackingEnabled;

    /**
     * @var ?bool $strictBotFilteringEnabled Opt-in aggressive bot detection (strict user-agent patterns, datacenter IPs, cross-send IP sweeps). Off by default; enabling it can lower reported open and click rates.
     */
    #[JsonProperty('strictBotFilteringEnabled')]
    public ?bool $strictBotFilteringEnabled;

    /**
     * @var ?bool $unsubscribeTrackingEnabled
     */
    #[JsonProperty('unsubscribeTrackingEnabled')]
    public ?bool $unsubscribeTrackingEnabled;

    /**
     * @param array{
     *   clickTrackingEnabled?: ?bool,
     *   defaultAttributionWindowHours?: ?int,
     *   openTrackingEnabled?: ?bool,
     *   strictBotFilteringEnabled?: ?bool,
     *   unsubscribeTrackingEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickTrackingEnabled = $values['clickTrackingEnabled'] ?? null;
        $this->defaultAttributionWindowHours = $values['defaultAttributionWindowHours'] ?? null;
        $this->openTrackingEnabled = $values['openTrackingEnabled'] ?? null;
        $this->strictBotFilteringEnabled = $values['strictBotFilteringEnabled'] ?? null;
        $this->unsubscribeTrackingEnabled = $values['unsubscribeTrackingEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
