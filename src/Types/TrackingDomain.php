<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * The company tracking domain. Every sending domain uses it for tracked links and opens. It never gates sending; until it verifies, or when it is broken or removed, links use the shared Sequenzy tracking domain.
 */
class TrackingDomain extends JsonSerializableType
{
    /**
     * @var bool $active True while verified. New emails use this domain only while active.
     */
    #[JsonProperty('active')]
    public bool $active;

    /**
     * @var TrackingDomainCnameRecord $cnameRecord The DNS record to publish.
     */
    #[JsonProperty('cnameRecord')]
    public TrackingDomainCnameRecord $cnameRecord;

    /**
     * @var string $domain Tracking hostname, for example links.example.com.
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var ?string $error Latest verification problem, if any.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var bool $everVerified True once this hostname has verified. A failed domain that was verified before is broken rather than unfinished.
     */
    #[JsonProperty('everVerified')]
    public bool $everVerified;

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
     * @var value-of<TrackingDomainStatus> $status Verification status of the CNAME and HTTPS certificate. not_started until the DNS setup is confirmed or checked.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?DateTime $verifiedAt
     */
    #[JsonProperty('verifiedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $verifiedAt;

    /**
     * @param array{
     *   active: bool,
     *   cnameRecord: TrackingDomainCnameRecord,
     *   domain: string,
     *   everVerified: bool,
     *   status: value-of<TrackingDomainStatus>,
     *   error?: ?string,
     *   lastCheckedAt?: ?DateTime,
     *   sslStatus?: ?string,
     *   verifiedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->active = $values['active'];
        $this->cnameRecord = $values['cnameRecord'];
        $this->domain = $values['domain'];
        $this->error = $values['error'] ?? null;
        $this->everVerified = $values['everVerified'];
        $this->lastCheckedAt = $values['lastCheckedAt'] ?? null;
        $this->sslStatus = $values['sslStatus'] ?? null;
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
