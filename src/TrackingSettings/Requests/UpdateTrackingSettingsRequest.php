<?php

namespace Sequenzy\TrackingSettings\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\TrackingSettings\Types\UpdateTrackingSettingsRequestAutoUtmSettings;

class UpdateTrackingSettingsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $autoUtmEnabled Whether UTM parameters are appended to outbound links automatically. Enabling this with no stored parameters seeds the platform defaults.
     */
    #[JsonProperty('autoUtmEnabled')]
    public ?bool $autoUtmEnabled;

    /**
     * @var ?UpdateTrackingSettingsRequestAutoUtmSettings $autoUtmSettings UTM templates merged over the stored ones. Null resets every parameter to the platform defaults; a null field stops that parameter being emitted.
     */
    #[JsonProperty('autoUtmSettings')]
    public ?UpdateTrackingSettingsRequestAutoUtmSettings $autoUtmSettings;

    /**
     * @var ?bool $clickTrackingEnabled Whether to rewrite links through the click-tracking redirect.
     */
    #[JsonProperty('clickTrackingEnabled')]
    public ?bool $clickTrackingEnabled;

    /**
     * @var ?int $defaultAttributionWindowHours Default revenue attribution window in hours.
     */
    #[JsonProperty('defaultAttributionWindowHours')]
    public ?int $defaultAttributionWindowHours;

    /**
     * @var ?bool $doubleOptInEnabled Whether new contacts must confirm by email before they become subscribed. This is the account-wide default that the per-request optInMode on subscriber creation overrides. Enabling it requires a sender profile and provisions the confirmation email automatically; it does not change contacts that are already active.
     */
    #[JsonProperty('doubleOptInEnabled')]
    public ?bool $doubleOptInEnabled;

    /**
     * @var ?string $doubleOptInRedirectUrl Where the hosted confirmation page sends subscribers after they confirm. Must be an http(s) URL of at most 500 characters after normalization; a bare domain is normalized to https. Null (or an empty string) clears it, keeping subscribers on the confirmation page branded with the company's name, logo, and colors.
     */
    #[JsonProperty('doubleOptInRedirectUrl')]
    public ?string $doubleOptInRedirectUrl;

    /**
     * @var ?bool $openTrackingEnabled Whether to embed the open-tracking pixel.
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
     *   autoUtmEnabled?: ?bool,
     *   autoUtmSettings?: ?UpdateTrackingSettingsRequestAutoUtmSettings,
     *   clickTrackingEnabled?: ?bool,
     *   defaultAttributionWindowHours?: ?int,
     *   doubleOptInEnabled?: ?bool,
     *   doubleOptInRedirectUrl?: ?string,
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
        $this->autoUtmEnabled = $values['autoUtmEnabled'] ?? null;
        $this->autoUtmSettings = $values['autoUtmSettings'] ?? null;
        $this->clickTrackingEnabled = $values['clickTrackingEnabled'] ?? null;
        $this->defaultAttributionWindowHours = $values['defaultAttributionWindowHours'] ?? null;
        $this->doubleOptInEnabled = $values['doubleOptInEnabled'] ?? null;
        $this->doubleOptInRedirectUrl = $values['doubleOptInRedirectUrl'] ?? null;
        $this->openTrackingEnabled = $values['openTrackingEnabled'] ?? null;
        $this->strictBotFilteringEnabled = $values['strictBotFilteringEnabled'] ?? null;
        $this->transactionalClickTrackingEnabled = $values['transactionalClickTrackingEnabled'] ?? null;
        $this->transactionalOpenTrackingEnabled = $values['transactionalOpenTrackingEnabled'] ?? null;
        $this->unsubscribeTrackingEnabled = $values['unsubscribeTrackingEnabled'] ?? null;
    }
}
