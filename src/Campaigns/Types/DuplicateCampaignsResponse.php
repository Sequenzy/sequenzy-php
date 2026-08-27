<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DuplicateCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?DuplicateCampaignsResponseCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?DuplicateCampaignsResponseCampaign $campaign;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaign?: ?DuplicateCampaignsResponseCampaign,
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
