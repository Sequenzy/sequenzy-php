<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CampaignGoal;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListGoalsCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<CampaignGoal> $goals
     */
    #[JsonProperty('goals'), ArrayType([CampaignGoal::class])]
    public ?array $goals;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   goals?: ?array<CampaignGoal>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->goals = $values['goals'] ?? null;
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
