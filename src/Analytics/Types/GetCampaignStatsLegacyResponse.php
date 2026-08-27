<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\ClickedLink;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\CampaignGoalMetrics;
use Sequenzy\Types\PollResultsSummary;
use Sequenzy\Types\RecommendationMetrics;
use Sequenzy\Types\EngagementStats;

class GetCampaignStatsLegacyResponse extends JsonSerializableType
{
    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?array<ClickedLink> $clickedLinks Lifetime per-link click breakdown, most clicked first (top 20). Omitted when the campaign has no tracked link clicks.
     */
    #[JsonProperty('clickedLinks'), ArrayType([ClickedLink::class])]
    public ?array $clickedLinks;

    /**
     * @var ?array<CampaignGoalMetrics> $goals Conversion goals attached to this campaign, including zero-conversion goals. Omitted when no goals are attached.
     */
    #[JsonProperty('goals'), ArrayType([CampaignGoalMetrics::class])]
    public ?array $goals;

    /**
     * @var ?string $mailboxProvider Echoed back when `mailboxProvider` is provided.
     */
    #[JsonProperty('mailboxProvider')]
    public ?string $mailboxProvider;

    /**
     * @var ?string $period
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?array<PollResultsSummary> $polls Lifetime Poll and NPS summaries. Omitted when the campaign has no responses.
     */
    #[JsonProperty('polls'), ArrayType([PollResultsSummary::class])]
    public ?array $polls;

    /**
     * @var ?RecommendationMetrics $recommendations
     */
    #[JsonProperty('recommendations')]
    public ?RecommendationMetrics $recommendations;

    /**
     * @var ?EngagementStats $stats
     */
    #[JsonProperty('stats')]
    public ?EngagementStats $stats;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   clickedLinks?: ?array<ClickedLink>,
     *   goals?: ?array<CampaignGoalMetrics>,
     *   mailboxProvider?: ?string,
     *   period?: ?string,
     *   polls?: ?array<PollResultsSummary>,
     *   recommendations?: ?RecommendationMetrics,
     *   stats?: ?EngagementStats,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->clickedLinks = $values['clickedLinks'] ?? null;
        $this->goals = $values['goals'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->polls = $values['polls'] ?? null;
        $this->recommendations = $values['recommendations'] ?? null;
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
