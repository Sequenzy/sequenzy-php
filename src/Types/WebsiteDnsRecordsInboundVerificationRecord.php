<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Optional public TXT record for an existing reply hostname outside its verified sending domain. Verification prepares this after the inbound MX verifies. Publish the exact value at the fully qualified name, then verify again. Absence can mean verification is already covered, preparation has not run, or preparation failed; inspect inboundRoutingStatus/error. This generated field cannot be set or cleared through the website API.
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
