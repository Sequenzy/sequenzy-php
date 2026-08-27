<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ResolvedCampaignAudience;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class GetAudienceCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?ResolvedCampaignAudience $audience
     */
    #[JsonProperty('audience')]
    public ?ResolvedCampaignAudience $audience;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?string $campaignName
     */
    #[JsonProperty('campaignName')]
    public ?string $campaignName;

    /**
     * @var ?int $recipientCount Subscribers matching the effective targeting right now.
     */
    #[JsonProperty('recipientCount')]
    public ?int $recipientCount;

    /**
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string, mixed> $targetLists Raw stored targeting exactly as persisted on the campaign.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @param array{
     *   audience?: ?ResolvedCampaignAudience,
     *   campaignId?: ?string,
     *   campaignName?: ?string,
     *   recipientCount?: ?int,
     *   scheduledAt?: ?DateTime,
     *   status?: ?string,
     *   success?: ?bool,
     *   targetLists?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audience = $values['audience'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->campaignName = $values['campaignName'] ?? null;
        $this->recipientCount = $values['recipientCount'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
