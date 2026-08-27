<?php

namespace Sequenzy\LandingPages\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateDomainSettingsLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var ?string $domain Replacement custom landing page domain.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?bool $verify Check DNS and SSL status for the current domain.
     */
    #[JsonProperty('verify')]
    public ?bool $verify;

    /**
     * @param array{
     *   domain?: ?string,
     *   verify?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domain = $values['domain'] ?? null;
        $this->verify = $values['verify'] ?? null;
    }
}
