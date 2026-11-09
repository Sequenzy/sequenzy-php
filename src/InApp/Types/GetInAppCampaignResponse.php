<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppCampaign;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\InAppCampaignStats;

class GetInAppCampaignResponse extends JsonSerializableType
{
    /**
     * @var ?InAppCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?InAppCampaign $campaign;

    /**
     * @var ?InAppCampaignStats $stats
     */
    #[JsonProperty('stats')]
    public ?InAppCampaignStats $stats;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaign?: ?InAppCampaign,
     *   stats?: ?InAppCampaignStats,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
        $this->stats = $values['stats'] ?? null;
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
