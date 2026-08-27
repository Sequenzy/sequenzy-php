<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * A segment-to-Meta-custom-audience sync mapping.
 */
class AudienceSync extends JsonSerializableType
{
    /**
     * @var ?string $adAccountId
     */
    #[JsonProperty('adAccountId')]
    public ?string $adAccountId;

    /**
     * @var ?string $audienceName
     */
    #[JsonProperty('audienceName')]
    public ?string $audienceName;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?value-of<AudienceSyncFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isActive
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?DateTime $lastSyncAt
     */
    #[JsonProperty('lastSyncAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncAt;

    /**
     * @var ?int $lastSyncedCount Subscribers uploaded in the most recent run.
     */
    #[JsonProperty('lastSyncedCount')]
    public ?int $lastSyncedCount;

    /**
     * @var ?string $lastSyncError
     */
    #[JsonProperty('lastSyncError')]
    public ?string $lastSyncError;

    /**
     * @var ?string $segmentId
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var ?string $segmentName
     */
    #[JsonProperty('segmentName')]
    public ?string $segmentName;

    /**
     * @var ?string $syncStatus idle, syncing, error, or disconnected (the Meta connection was revoked; the sync is paused until you reconnect)
     */
    #[JsonProperty('syncStatus')]
    public ?string $syncStatus;

    /**
     * @param array{
     *   adAccountId?: ?string,
     *   audienceName?: ?string,
     *   createdAt?: ?DateTime,
     *   frequency?: ?value-of<AudienceSyncFrequency>,
     *   id?: ?string,
     *   isActive?: ?bool,
     *   lastSyncAt?: ?DateTime,
     *   lastSyncedCount?: ?int,
     *   lastSyncError?: ?string,
     *   segmentId?: ?string,
     *   segmentName?: ?string,
     *   syncStatus?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adAccountId = $values['adAccountId'] ?? null;
        $this->audienceName = $values['audienceName'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->lastSyncedCount = $values['lastSyncedCount'] ?? null;
        $this->lastSyncError = $values['lastSyncError'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->segmentName = $values['segmentName'] ?? null;
        $this->syncStatus = $values['syncStatus'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
