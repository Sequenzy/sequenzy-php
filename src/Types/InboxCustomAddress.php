<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The branded address you chose, or null.
 */
class InboxCustomAddress extends JsonSerializableType
{
    /**
     * @var ?string $address The full address, localPart@domain, such as support@acme.com.
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var string $domain The receiving domain the address is on.
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var string $localPart
     */
    #[JsonProperty('localPart')]
    public string $localPart;

    /**
     * @var value-of<InboxCustomAddressStatus> $status `active` once the receiving domain is verified; `pending` until then.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   domain: string,
     *   localPart: string,
     *   status: value-of<InboxCustomAddressStatus>,
     *   address?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'] ?? null;
        $this->domain = $values['domain'];
        $this->localPart = $values['localPart'];
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
