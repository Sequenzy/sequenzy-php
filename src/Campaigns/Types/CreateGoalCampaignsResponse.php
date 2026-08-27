<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CampaignGoal;
use Sequenzy\Core\Json\JsonProperty;

class CreateGoalCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?CampaignGoal $goal
     */
    #[JsonProperty('goal')]
    public ?CampaignGoal $goal;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   goal?: ?CampaignGoal,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->goal = $values['goal'] ?? null;
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
