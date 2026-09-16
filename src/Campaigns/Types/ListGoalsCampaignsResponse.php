<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CompanyGoal;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\CampaignGoal;

class ListGoalsCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<CompanyGoal> $companyGoals Company-wide goals from Settings, including inactive goals. Empty when none exist. These are not attached to or editable through this campaign.
     */
    #[JsonProperty('companyGoals'), ArrayType([CompanyGoal::class])]
    public ?array $companyGoals;

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
     *   companyGoals?: ?array<CompanyGoal>,
     *   goals?: ?array<CampaignGoal>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->companyGoals = $values['companyGoals'] ?? null;
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
