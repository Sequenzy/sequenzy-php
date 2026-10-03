<?php

namespace Sequenzy\TrackingDomain\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RemoveTrackingDomainResponse extends JsonSerializableType
{
    /**
     * @var ?bool $removed False when no tracking domain was set.
     */
    #[JsonProperty('removed')]
    public ?bool $removed;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var mixed $trackingDomain
     */
    #[JsonProperty('trackingDomain')]
    public mixed $trackingDomain;

    /**
     * @param array{
     *   removed?: ?bool,
     *   success?: ?bool,
     *   trackingDomain?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->removed = $values['removed'] ?? null;
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
