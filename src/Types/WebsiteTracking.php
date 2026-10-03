<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Link tracking for this domain. Every sending domain uses the company tracking domain, which never gates verification or sending; until it verifies, links use the shared Sequenzy tracking domain. Manage it with the Tracking Domain endpoints.
 */
class WebsiteTracking extends JsonSerializableType
{
    /**
     * @var ?WebsiteTrackingCnameRecord $cnameRecord The CNAME to publish for hostname.
     */
    #[JsonProperty('cnameRecord')]
    public ?WebsiteTrackingCnameRecord $cnameRecord;

    /**
     * @var ?string $error Last tracking verification error, if any.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $hostname The company tracking hostname, or null when links use the shared Sequenzy tracking domain.
     */
    #[JsonProperty('hostname')]
    public ?string $hostname;

    /**
     * @var ?value-of<WebsiteTrackingPolicy> $policy Always legacy. Kept for compatibility.
     */
    #[JsonProperty('policy')]
    public ?string $policy;

    /**
     * @var ?bool $ready Whether hostname is verified and serving HTTPS.
     */
    #[JsonProperty('ready')]
    public ?bool $ready;

    /**
     * @var ?bool $required Always false; tracking never gates sending. Kept for compatibility.
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @var ?value-of<WebsiteTrackingStatus> $status Verification status of hostname, including HTTPS. not_started until you confirm DNS setup with Verify Sending Domain or check it with Verify Tracking Domain.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   cnameRecord?: ?WebsiteTrackingCnameRecord,
     *   error?: ?string,
     *   hostname?: ?string,
     *   policy?: ?value-of<WebsiteTrackingPolicy>,
     *   ready?: ?bool,
     *   required?: ?bool,
     *   status?: ?value-of<WebsiteTrackingStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cnameRecord = $values['cnameRecord'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->hostname = $values['hostname'] ?? null;
        $this->policy = $values['policy'] ?? null;
        $this->ready = $values['ready'] ?? null;
        $this->required = $values['required'] ?? null;
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
