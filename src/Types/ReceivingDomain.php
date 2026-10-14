<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * A domain or subdomain whose mail reaches your Inbox, such as acme.com or support.acme.com. Every address on it lands in Inbox. Once it is verified, replies to emails you send from any of your sending domains come back to reply addresses on it.
 */
class ReceivingDomain extends JsonSerializableType
{
    /**
     * @var ?DateTime $claimExpiresAt When a new domain that has never verified stops being reserved for your workspace, after which another workspace may add it. Null once verified, and for domains moved over from an earlier reply setup.
     */
    #[JsonProperty('claimExpiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $claimExpiresAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var string $domain Lowercase domain name without a trailing dot.
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var ?string $error What to fix, when known. Always null while verified.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?DateTime $lastCheckedAt
     */
    #[JsonProperty('lastCheckedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastCheckedAt;

    /**
     * @var array<ReceivingDomainDnsRecord> $records DNS records to publish. Always the MX record; the TXT record at _amazonses.<domain> is listed only when Amazon SES needs proof that you own the name.
     */
    #[JsonProperty('records'), ArrayType([ReceivingDomainDnsRecord::class])]
    public array $records;

    /**
     * @var value-of<ReceivingDomainStatus> $status verified: mail arrives and new reply addresses use the domain. pending: waiting for the DNS records; a newly added name stays reserved for your workspace for 7 days. failed: the domain was set up and something broke, or its 7-day reservation ran out before the records were found; mail that still arrives is accepted, and new reply addresses use inbound.sequenzy.com until it is fixed.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?DateTime $verifiedAt When the domain first verified.
     */
    #[JsonProperty('verifiedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $verifiedAt;

    /**
     * @param array{
     *   createdAt: DateTime,
     *   domain: string,
     *   id: string,
     *   records: array<ReceivingDomainDnsRecord>,
     *   status: value-of<ReceivingDomainStatus>,
     *   claimExpiresAt?: ?DateTime,
     *   error?: ?string,
     *   lastCheckedAt?: ?DateTime,
     *   verifiedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->claimExpiresAt = $values['claimExpiresAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->domain = $values['domain'];
        $this->error = $values['error'] ?? null;
        $this->id = $values['id'];
        $this->lastCheckedAt = $values['lastCheckedAt'] ?? null;
        $this->records = $values['records'];
        $this->status = $values['status'];
        $this->verifiedAt = $values['verifiedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
