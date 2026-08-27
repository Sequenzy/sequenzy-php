<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TrackingSettings extends JsonSerializableType
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

    /**
     * @param array{
     *   autoUtm?: ?TrackingSettingsAutoUtm,
     *   consent?: ?TrackingSettingsConsent,
     *   replyTracking?: ?TrackingSettingsReplyTracking,
     *   success?: ?bool,
     *   tracking?: ?TrackingSettingsTracking,
     *   trackingDomain?: ?TrackingSettingsTrackingDomain,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->autoUtm = $values['autoUtm'] ?? null;
        $this->consent = $values['consent'] ?? null;
        $this->replyTracking = $values['replyTracking'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->trackingDomain = $values['trackingDomain'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
