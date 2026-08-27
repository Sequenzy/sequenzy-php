<?php

namespace Sequenzy\LandingPages\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ConnectDedicatedDomainLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var string $domain
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @param array{
     *   domain: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domain = $values['domain'];
    }
}
