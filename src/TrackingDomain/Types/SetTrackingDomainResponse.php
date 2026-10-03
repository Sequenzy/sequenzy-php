<?php

namespace Sequenzy\TrackingDomain\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TrackingDomain;

class SetTrackingDomainResponse extends JsonSerializableType
{
    /**
     * @var ?string $message The next step, usually the CNAME to add.
     */
    #[JsonProperty('message')]
    public ?string $message;

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
     *   message?: ?string,
     *   success?: ?bool,
     *   trackingDomain?: ?TrackingDomain,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
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
