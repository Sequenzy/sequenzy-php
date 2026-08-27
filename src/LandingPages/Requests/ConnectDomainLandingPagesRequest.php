<?php

namespace Sequenzy\LandingPages\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ConnectDomainLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var string $domain Custom landing page domain.
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
