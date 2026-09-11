<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class Website extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<string, mixed> $dkim Normalized DKIM type, status, and diagnostics.
     */
    #[JsonProperty('dkim'), ArrayType(['string' => 'mixed'])]
    public ?array $dkim;

    /**
     * @var ?WebsiteDnsRecords $dnsRecords The DNS records to publish and their per-record verification status. Custom reply routing is independent of sending readiness. GET returns stored results; POST verify performs a fresh check.
     */
    #[JsonProperty('dnsRecords')]
    public ?WebsiteDnsRecords $dnsRecords;

    /**
     * @var ?bool $dnsVerified Whether the customer DNS records are verified.
     */
    #[JsonProperty('dnsVerified')]
    public ?bool $dnsVerified;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $lastVerifiedAt
     */
    #[JsonProperty('lastVerifiedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastVerifiedAt;

    /**
     * @var ?array<string, mixed> $mailFrom Normalized custom MAIL FROM MX status and diagnostics.
     */
    #[JsonProperty('mailFrom'), ArrayType(['string' => 'mixed'])]
    public ?array $mailFrom;

    /**
     * @var ?string $message Creation or setup summary when returned by a mutating operation.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?DateTime $nextVerificationAt
     */
    #[JsonProperty('nextVerificationAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextVerificationAt;

    /**
     * @var ?WebsiteReadiness $readiness Customer-facing sending readiness. When readyToSend is false, reason says why; dns_* reasons describe your DNS records, while activation reasons resolve on Sequenzy's side.
     */
    #[JsonProperty('readiness')]
    public ?WebsiteReadiness $readiness;

    /**
     * @var ?bool $readyToSend Whether the domain is fully ready to send (DNS verified and activation finished).
     */
    #[JsonProperty('readyToSend')]
    public ?bool $readyToSend;

    /**
     * @var ?array<string, mixed> $spf Normalized SPF status, expected record, and diagnostics.
     */
    #[JsonProperty('spf'), ArrayType(['string' => 'mixed'])]
    public ?array $spf;

    /**
     * @var ?value-of<WebsiteStatus> $status Stored DNS verification status. This does not imply that a sending transport is ready.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   dkim?: ?array<string, mixed>,
     *   dnsRecords?: ?WebsiteDnsRecords,
     *   dnsVerified?: ?bool,
     *   domain?: ?string,
     *   id?: ?string,
     *   lastVerifiedAt?: ?DateTime,
     *   mailFrom?: ?array<string, mixed>,
     *   message?: ?string,
     *   nextVerificationAt?: ?DateTime,
     *   readiness?: ?WebsiteReadiness,
     *   readyToSend?: ?bool,
     *   spf?: ?array<string, mixed>,
     *   status?: ?value-of<WebsiteStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->dkim = $values['dkim'] ?? null;
        $this->dnsRecords = $values['dnsRecords'] ?? null;
        $this->dnsVerified = $values['dnsVerified'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastVerifiedAt = $values['lastVerifiedAt'] ?? null;
        $this->mailFrom = $values['mailFrom'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->nextVerificationAt = $values['nextVerificationAt'] ?? null;
        $this->readiness = $values['readiness'] ?? null;
        $this->readyToSend = $values['readyToSend'] ?? null;
        $this->spf = $values['spf'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
