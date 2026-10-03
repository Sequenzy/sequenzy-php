<?php

namespace Sequenzy\TrackingDomain\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TrackingDomain;

class GetTrackingDomainResponse extends JsonSerializableType
{
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
     *   success?: ?bool,
     *   trackingDomain?: ?TrackingDomain,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
