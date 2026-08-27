<?php

namespace Sequenzy\TrackingSettings\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\TrackingSettings;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TrackingSettingsAutoUtm;
use Sequenzy\Types\TrackingSettingsConsent;
use Sequenzy\Types\TrackingSettingsReplyTracking;
use Sequenzy\Types\TrackingSettingsTracking;
use Sequenzy\Types\TrackingSettingsTrackingDomain;

class UpdateTrackingSettingsResponse extends JsonSerializableType
{
    use TrackingSettings;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   autoUtm?: ?TrackingSettingsAutoUtm,
     *   consent?: ?TrackingSettingsConsent,
     *   replyTracking?: ?TrackingSettingsReplyTracking,
     *   success?: ?bool,
     *   tracking?: ?TrackingSettingsTracking,
     *   trackingDomain?: ?TrackingSettingsTrackingDomain,
     *   message?: ?string,
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
        $this->message = $values['message'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
