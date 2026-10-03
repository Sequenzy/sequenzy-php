<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class PushDevice extends JsonSerializableType
{
    /**
     * @var ?string $appVersion
     */
    #[JsonProperty('appVersion')]
    public ?string $appVersion;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $deviceName
     */
    #[JsonProperty('deviceName')]
    public ?string $deviceName;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $invalidReason Why the push service rejected the token, for invalid devices.
     */
    #[JsonProperty('invalidReason')]
    public ?string $invalidReason;

    /**
     * @var ?DateTime $lastSeenAt
     */
    #[JsonProperty('lastSeenAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSeenAt;

    /**
     * @var ?string $locale
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?string $osVersion
     */
    #[JsonProperty('osVersion')]
    public ?string $osVersion;

    /**
     * @var ?value-of<PushDevicePlatform> $platform
     */
    #[JsonProperty('platform')]
    public ?string $platform;

    /**
     * @var ?value-of<PushDeviceSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?value-of<PushDeviceStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subscriberId Linked contact, or null for anonymous browsers.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var ?string $tokenPreview Last characters of the token.
     */
    #[JsonProperty('tokenPreview')]
    public ?string $tokenPreview;

    /**
     * @var ?string $userAgent
     */
    #[JsonProperty('userAgent')]
    public ?string $userAgent;

    /**
     * @param array{
     *   appVersion?: ?string,
     *   createdAt?: ?DateTime,
     *   deviceName?: ?string,
     *   id?: ?string,
     *   invalidReason?: ?string,
     *   lastSeenAt?: ?DateTime,
     *   locale?: ?string,
     *   osVersion?: ?string,
     *   platform?: ?value-of<PushDevicePlatform>,
     *   source?: ?value-of<PushDeviceSource>,
     *   status?: ?value-of<PushDeviceStatus>,
     *   subscriberId?: ?string,
     *   timezone?: ?string,
     *   tokenPreview?: ?string,
     *   userAgent?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->appVersion = $values['appVersion'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->deviceName = $values['deviceName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->invalidReason = $values['invalidReason'] ?? null;
        $this->lastSeenAt = $values['lastSeenAt'] ?? null;
        $this->locale = $values['locale'] ?? null;
        $this->osVersion = $values['osVersion'] ?? null;
        $this->platform = $values['platform'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->tokenPreview = $values['tokenPreview'] ?? null;
        $this->userAgent = $values['userAgent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
