<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Company tracking domain, used by every sending domain for tracked links and opens. Null when links use the shared Sequenzy tracking domain; links also use it while the tracking domain is not verified. Manage it with the Tracking Domain endpoints.
 */
class TrackingSettingsTrackingDomain extends JsonSerializableType
{
    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

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
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $verifiedAt
     */
    #[JsonProperty('verifiedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $verifiedAt;

    /**
     * @param array{
     *   domain?: ?string,
     *   error?: ?string,
     *   lastCheckedAt?: ?DateTime,
     *   sslStatus?: ?string,
     *   status?: ?string,
     *   verifiedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domain = $values['domain'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->lastCheckedAt = $values['lastCheckedAt'] ?? null;
        $this->sslStatus = $values['sslStatus'] ?? null;
        $this->status = $values['status'] ?? null;
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
