<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\PushCampaign;
use Sequenzy\Core\Json\JsonProperty;

class UpdatePushCampaignResponse extends JsonSerializableType
{
    /**
     * @var ?PushCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?PushCampaign $campaign;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaign?: ?PushCampaign,
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
