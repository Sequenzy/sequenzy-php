<?php

namespace Sequenzy\ReceivingDomains\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AddReceivingDomainRequest extends JsonSerializableType
{
    /**
     * @var string $domain Domain or subdomain you own, such as acme.com or support.acme.com. Case and a trailing dot are ignored.
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
