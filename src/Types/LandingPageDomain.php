<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class LandingPageDomain extends JsonSerializableType
{
    /**
     * @var ?string $cnameTarget
     */
    #[JsonProperty('cnameTarget')]
    public ?string $cnameTarget;

    /**
     * @var ?DateTime $dnsRecordAddedAt
     */
    #[JsonProperty('dnsRecordAddedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dnsRecordAddedAt;

    /**
     * @var ?string $dnsRecordName DNS record name (the connected hostname); null when no domain is connected.
     */
    #[JsonProperty('dnsRecordName')]
    public ?string $dnsRecordName;

    /**
     * @var ?value-of<LandingPageDomainDnsRecordType> $dnsRecordType DNS record type to add - CNAME for subdomains, A for root domains.
     */
    #[JsonProperty('dnsRecordType')]
    public ?string $dnsRecordType;

    /**
     * @var ?string $dnsRecordValue DNS record value - the CNAME target for subdomains or the A record IP (76.76.21.21) for root domains.
     */
    #[JsonProperty('dnsRecordValue')]
    public ?string $dnsRecordValue;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?value-of<LandingPageDomainDomainScope> $domainScope Domain assignment scope.
     */
    #[JsonProperty('domainScope')]
    public ?string $domainScope;

    /**
     * @var ?string $domainStatus
     */
    #[JsonProperty('domainStatus')]
    public ?string $domainStatus;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $fallbackDomain Verified or pending workspace domain retained as a fallback for a page-scoped domain.
     */
    #[JsonProperty('fallbackDomain')]
    public ?string $fallbackDomain;

    /**
     * @var ?string $fallbackDomainStatus Workspace fallback-domain status; `not_started` when no fallback domain is configured.
     */
    #[JsonProperty('fallbackDomainStatus')]
    public ?string $fallbackDomainStatus;

    /**
     * @var ?string $landingPageId Assigned landing page ID for a dedicated page domain.
     */
    #[JsonProperty('landingPageId')]
    public ?string $landingPageId;

    /**
     * @var ?DateTime $lastCheckedAt
     */
    #[JsonProperty('lastCheckedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastCheckedAt;

    /**
     * @var ?string $sslStatus
     */
    #[JsonProperty('sslStatus')]
    public ?string $sslStatus;

    /**
     * @var ?array<array<string, mixed>> $verificationRecords
     */
    #[JsonProperty('verificationRecords'), ArrayType([['string' => 'mixed']])]
    public ?array $verificationRecords;

    /**
     * @var ?DateTime $verifiedAt
     */
    #[JsonProperty('verifiedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $verifiedAt;

    /**
     * @param array{
     *   cnameTarget?: ?string,
     *   dnsRecordAddedAt?: ?DateTime,
     *   dnsRecordName?: ?string,
     *   dnsRecordType?: ?value-of<LandingPageDomainDnsRecordType>,
     *   dnsRecordValue?: ?string,
     *   domain?: ?string,
     *   domainScope?: ?value-of<LandingPageDomainDomainScope>,
     *   domainStatus?: ?string,
     *   error?: ?string,
     *   fallbackDomain?: ?string,
     *   fallbackDomainStatus?: ?string,
     *   landingPageId?: ?string,
     *   lastCheckedAt?: ?DateTime,
     *   sslStatus?: ?string,
     *   verificationRecords?: ?array<array<string, mixed>>,
     *   verifiedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cnameTarget = $values['cnameTarget'] ?? null;
        $this->dnsRecordAddedAt = $values['dnsRecordAddedAt'] ?? null;
        $this->dnsRecordName = $values['dnsRecordName'] ?? null;
        $this->dnsRecordType = $values['dnsRecordType'] ?? null;
        $this->dnsRecordValue = $values['dnsRecordValue'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->domainScope = $values['domainScope'] ?? null;
        $this->domainStatus = $values['domainStatus'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->fallbackDomain = $values['fallbackDomain'] ?? null;
        $this->fallbackDomainStatus = $values['fallbackDomainStatus'] ?? null;
        $this->landingPageId = $values['landingPageId'] ?? null;
        $this->lastCheckedAt = $values['lastCheckedAt'] ?? null;
        $this->sslStatus = $values['sslStatus'] ?? null;
        $this->verificationRecords = $values['verificationRecords'] ?? null;
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
