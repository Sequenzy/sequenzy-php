<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Push\Types\RegisterPushDeviceRequestKeys;
use Sequenzy\Push\Types\RegisterPushDeviceRequestPlatform;

class RegisterPushDeviceRequest extends JsonSerializableType
{
    /**
     * @var ?string $appVersion
     */
    #[JsonProperty('appVersion')]
    public ?string $appVersion;

    /**
     * @var ?string $deviceName
     */
    #[JsonProperty('deviceName')]
    public ?string $deviceName;

    /**
     * @var ?string $email Contact to link. Created quietly when new.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?RegisterPushDeviceRequestKeys $keys Web only. PushSubscription.toJSON().keys.
     */
    #[JsonProperty('keys')]
    public ?RegisterPushDeviceRequestKeys $keys;

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
     * @var value-of<RegisterPushDeviceRequestPlatform> $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var ?string $subscriberId Existing subscriber to link instead of email.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?string $timezone IANA timezone.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var string $token iOS: the hex APNs device token. Android: the FCM registration token. Web: the PushSubscription endpoint (also send keys).
     */
    #[JsonProperty('token')]
    public string $token;

    /**
     * @param array{
     *   platform: value-of<RegisterPushDeviceRequestPlatform>,
     *   token: string,
     *   appVersion?: ?string,
     *   deviceName?: ?string,
     *   email?: ?string,
     *   keys?: ?RegisterPushDeviceRequestKeys,
     *   locale?: ?string,
     *   osVersion?: ?string,
     *   subscriberId?: ?string,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->appVersion = $values['appVersion'] ?? null;
        $this->deviceName = $values['deviceName'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->keys = $values['keys'] ?? null;
        $this->locale = $values['locale'] ?? null;
        $this->osVersion = $values['osVersion'] ?? null;
        $this->platform = $values['platform'];
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->token = $values['token'];
    }
}
