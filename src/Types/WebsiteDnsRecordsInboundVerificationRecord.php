<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Deprecated. Receiving is now set up with receiving domains (/receiving-domains). This field reflects a reply setup from before receiving domains, is only present on domains that had one, and is no longer used to route mail. It held the TXT record an older inbound reply host needed for Amazon SES ownership; a migrated host's records now appear on its receiving domain.
 */
class WebsiteDnsRecordsInboundVerificationRecord extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $value Public domain-ownership token, not an API credential.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   name: string,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
