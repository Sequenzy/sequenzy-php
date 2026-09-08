<?php

namespace Sequenzy\LandingPages\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\LandingPageDomain;
use Sequenzy\Core\Json\JsonProperty;

class RemoveDedicatedDomainLandingPagesResponse extends JsonSerializableType
{
    /**
     * @var ?LandingPageDomain $domain
     */
    #[JsonProperty('domain')]
    public ?LandingPageDomain $domain;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   domain?: ?LandingPageDomain,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domain = $values['domain'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
