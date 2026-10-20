<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class LiveActivityToken extends JsonSerializableType
{
    /**
     * @var ?string $activityId Your activity id. Null for push-to-start tokens.
     */
    #[JsonProperty('activityId')]
    public ?string $activityId;

    /**
     * @var ?string $activityType The Swift ActivityAttributes type name.
     */
    #[JsonProperty('activityType')]
    public ?string $activityType;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $deviceId The push device of the same installation, when the app registered one.
     */
    #[JsonProperty('deviceId')]
    public ?string $deviceId;

    /**
     * @var ?DateTime $endedAt
     */
    #[JsonProperty('endedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endedAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $invalidReason Why the token is invalid, such as `replaced`, `unregistered` or an APNs reason like `Unregistered`.
     */
    #[JsonProperty('invalidReason')]
    public ?string $invalidReason;

    /**
     * @var ?value-of<LiveActivityTokenKind> $kind push_to_start tokens start activities of a type on one device; update tokens address one running activity.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?DateTime $lastPushAt
     */
    #[JsonProperty('lastPushAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastPushAt;

    /**
     * @var ?string $lastPushError
     */
    #[JsonProperty('lastPushError')]
    public ?string $lastPushError;

    /**
     * @var ?string $lastPushOutcome accepted, invalid_token, credentials_error, failed, retryable, or retrying while a retry is pending.
     */
    #[JsonProperty('lastPushOutcome')]
    public ?string $lastPushOutcome;

    /**
     * @var ?DateTime $lastSeenAt
     */
    #[JsonProperty('lastSeenAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSeenAt;

    /**
     * @var ?value-of<LiveActivityTokenStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?string $tokenPreview Last eight characters of the token.
     */
    #[JsonProperty('tokenPreview')]
    public ?string $tokenPreview;

    /**
     * @param array{
     *   activityId?: ?string,
     *   activityType?: ?string,
     *   createdAt?: ?DateTime,
     *   deviceId?: ?string,
     *   endedAt?: ?DateTime,
     *   id?: ?string,
     *   invalidReason?: ?string,
     *   kind?: ?value-of<LiveActivityTokenKind>,
     *   lastPushAt?: ?DateTime,
     *   lastPushError?: ?string,
     *   lastPushOutcome?: ?string,
     *   lastSeenAt?: ?DateTime,
     *   status?: ?value-of<LiveActivityTokenStatus>,
     *   subscriberId?: ?string,
     *   tokenPreview?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activityId = $values['activityId'] ?? null;
        $this->activityType = $values['activityType'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->deviceId = $values['deviceId'] ?? null;
        $this->endedAt = $values['endedAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->invalidReason = $values['invalidReason'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->lastPushAt = $values['lastPushAt'] ?? null;
        $this->lastPushError = $values['lastPushError'] ?? null;
        $this->lastPushOutcome = $values['lastPushOutcome'] ?? null;
        $this->lastSeenAt = $values['lastSeenAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->tokenPreview = $values['tokenPreview'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
