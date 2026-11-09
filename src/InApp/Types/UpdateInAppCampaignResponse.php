<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\InAppCampaign;
use Sequenzy\Core\Json\JsonProperty;

class UpdateInAppCampaignResponse extends JsonSerializableType
{
    /**
     * @var ?InAppCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?InAppCampaign $campaign;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaign?: ?InAppCampaign,
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
