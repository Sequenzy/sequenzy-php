<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CampaignDetail;
use Sequenzy\Core\Json\JsonProperty;

class ResumeCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?CampaignDetail $campaign
     */
    #[JsonProperty('campaign')]
    public ?CampaignDetail $campaign;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaign?: ?CampaignDetail,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
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
