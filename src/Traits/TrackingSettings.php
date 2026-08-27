<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\TrackingSettingsAutoUtm;
use Sequenzy\Types\TrackingSettingsConsent;
use Sequenzy\Types\TrackingSettingsReplyTracking;
use Sequenzy\Types\TrackingSettingsTracking;
use Sequenzy\Types\TrackingSettingsTrackingDomain;
use Sequenzy\Core\Json\JsonProperty;

/**
 * @property ?TrackingSettingsAutoUtm $autoUtm
 * @property ?TrackingSettingsConsent $consent
 * @property ?TrackingSettingsReplyTracking $replyTracking
 * @property ?bool $success
 * @property ?TrackingSettingsTracking $tracking
 * @property ?TrackingSettingsTrackingDomain $trackingDomain
 */
trait TrackingSettings
{
    /**
     * @var ?TrackingSettingsAutoUtm $autoUtm
     */
    #[JsonProperty('autoUtm')]
    public ?TrackingSettingsAutoUtm $autoUtm;

    /**
     * @var ?TrackingSettingsConsent $consent Signup consent settings, as opposed to engagement measurement.
     */
    #[JsonProperty('consent')]
    public ?TrackingSettingsConsent $consent;

    /**
     * @var ?TrackingSettingsReplyTracking $replyTracking
     */
    #[JsonProperty('replyTracking')]
    public ?TrackingSettingsReplyTracking $replyTracking;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?TrackingSettingsTracking $tracking
     */
    #[JsonProperty('tracking')]
    public ?TrackingSettingsTracking $tracking;

    /**
     * @var ?TrackingSettingsTrackingDomain $trackingDomain Null when click links use the shared Sequenzy tracking domain.
     */
    #[JsonProperty('trackingDomain')]
    public ?TrackingSettingsTrackingDomain $trackingDomain;
}
