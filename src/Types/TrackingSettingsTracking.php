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
     * @var ?bool $transactionalClickTrackingEnabled Click tracking default for sends through the Send Email API. Account-wide click tracking must also be enabled; per-send trackingSettings can only opt out.
     */
    #[JsonProperty('transactionalClickTrackingEnabled')]
    public ?bool $transactionalClickTrackingEnabled;

    /**
     * @var ?bool $transactionalOpenTrackingEnabled Open tracking default for sends through the Send Email API. Account-wide open tracking must also be enabled; per-send trackingSettings can only opt out.
     */
    #[JsonProperty('transactionalOpenTrackingEnabled')]
    public ?bool $transactionalOpenTrackingEnabled;

    /**
     * @var ?bool $unsubscribeTrackingEnabled Whether to track unsubscribe link clicks. When false, Sequenzy unsubscribe links go directly to https://sequenzy.com, even with a custom tracking domain. Actual unsubscribes and their email attribution are still recorded.
     */
    #[JsonProperty('unsubscribeTrackingEnabled')]
    public ?bool $unsubscribeTrackingEnabled;

    /**
     * @param array{
     *   clickTrackingEnabled?: ?bool,
     *   defaultAttributionWindowHours?: ?int,
     *   openTrackingEnabled?: ?bool,
     *   strictBotFilteringEnabled?: ?bool,
     *   transactionalClickTrackingEnabled?: ?bool,
     *   transactionalOpenTrackingEnabled?: ?bool,
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
        $this->transactionalClickTrackingEnabled = $values['transactionalClickTrackingEnabled'] ?? null;
        $this->transactionalOpenTrackingEnabled = $values['transactionalOpenTrackingEnabled'] ?? null;
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
