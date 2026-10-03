<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\InboxCustomAddress;

class GetInboxAddressResponseInbox extends JsonSerializableType
{
    /**
     * @var string $address The address to share. Your branded address once it is active, otherwise the default address.
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var array<string> $addresses Every address that currently delivers to this inbox, starting with `address`.
     */
    #[JsonProperty('addresses'), ArrayType(['string'])]
    public array $addresses;

    /**
     * @var bool $attachmentsAvailable Whether attachment content is stored and can be sent with replies.
     */
    #[JsonProperty('attachmentsAvailable')]
    public bool $attachmentsAvailable;

    /**
     * @var ?InboxCustomAddress $customAddress
     */
    #[JsonProperty('customAddress')]
    public ?InboxCustomAddress $customAddress;

    /**
     * @var string $defaultAddress inbox+{companyId}@inbound.sequenzy.com. Always works.
     */
    #[JsonProperty('defaultAddress')]
    public string $defaultAddress;

    /**
     * @var bool $enabled Whether the company receives email. When false, replies and inbox address email are not stored.
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var int $retentionDays Days received email and attachments are kept.
     */
    #[JsonProperty('retentionDays')]
    public int $retentionDays;

    /**
     * @param array{
     *   address: string,
     *   addresses: array<string>,
     *   attachmentsAvailable: bool,
     *   defaultAddress: string,
     *   enabled: bool,
     *   retentionDays: int,
     *   customAddress?: ?InboxCustomAddress,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->address = $values['address'];
        $this->addresses = $values['addresses'];
        $this->attachmentsAvailable = $values['attachmentsAvailable'];
        $this->customAddress = $values['customAddress'] ?? null;
        $this->defaultAddress = $values['defaultAddress'];
        $this->enabled = $values['enabled'];
        $this->retentionDays = $values['retentionDays'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
