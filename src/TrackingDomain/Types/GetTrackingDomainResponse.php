<?php

namespace Sequenzy\TrackingDomain\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TrackingDomain;

class GetTrackingDomainResponse extends JsonSerializableType
{
    /**
     * @var ?bool $requireCustomTracking True when this workspace's sending policy requires a verified custom tracking domain and disallows fallback to shared tracking domains.
     */
    #[JsonProperty('requireCustomTracking')]
    public ?bool $requireCustomTracking;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?TrackingDomain $trackingDomain
     */
    #[JsonProperty('trackingDomain')]
    public ?TrackingDomain $trackingDomain;

    /**
     * @param array{
     *   requireCustomTracking?: ?bool,
     *   success?: ?bool,
     *   trackingDomain?: ?TrackingDomain,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->requireCustomTracking = $values['requireCustomTracking'] ?? null;
        $this->success = $values['success'] ?? null;
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
