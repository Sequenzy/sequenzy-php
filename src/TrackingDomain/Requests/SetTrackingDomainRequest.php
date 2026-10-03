<?php

namespace Sequenzy\TrackingDomain\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SetTrackingDomainRequest extends JsonSerializableType
{
    /**
     * @var string $domain Tracking hostname, a subdomain such as links.example.com. A leading https:// and trailing path are ignored.
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
