<?php

namespace Sequenzy\TrackingDomain\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TrackingDomain;

class VerifyTrackingDomainResponse extends JsonSerializableType
{
    /**
     * @var ?string $message The result or the next step.
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
     * @var ?bool $verified Whether the CNAME and HTTPS certificate work.
     */
    #[JsonProperty('verified')]
    public ?bool $verified;

    /**
     * @param array{
     *   message?: ?string,
     *   success?: ?bool,
     *   trackingDomain?: ?TrackingDomain,
     *   verified?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->trackingDomain = $values['trackingDomain'] ?? null;
        $this->verified = $values['verified'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
