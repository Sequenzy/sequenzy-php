<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ResendToNonOpenersCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?ResendToNonOpenersCampaignsResponseCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?ResendToNonOpenersCampaignsResponseCampaign $campaign;

    /**
     * @var ?int $estimatedNonOpenerCount Estimated number of subscribers who haven't opened the original campaign.
     */
    #[JsonProperty('estimatedNonOpenerCount')]
    public ?int $estimatedNonOpenerCount;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaign?: ?ResendToNonOpenersCampaignsResponseCampaign,
     *   estimatedNonOpenerCount?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
        $this->estimatedNonOpenerCount = $values['estimatedNonOpenerCount'] ?? null;
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
