<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\InAppCampaignStats;

class GetInAppCampaignStatsResponse extends JsonSerializableType
{
    /**
     * @var ?int $audienceAtLaunch Contacts who matched the audience at launch.
     */
    #[JsonProperty('audienceAtLaunch')]
    public ?int $audienceAtLaunch;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?value-of<GetInAppCampaignStatsResponseState> $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?InAppCampaignStats $stats
     */
    #[JsonProperty('stats')]
    public ?InAppCampaignStats $stats;

    /**
     * @var ?value-of<GetInAppCampaignStatsResponseStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   audienceAtLaunch?: ?int,
     *   campaignId?: ?string,
     *   state?: ?value-of<GetInAppCampaignStatsResponseState>,
     *   stats?: ?InAppCampaignStats,
     *   status?: ?value-of<GetInAppCampaignStatsResponseStatus>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceAtLaunch = $values['audienceAtLaunch'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
