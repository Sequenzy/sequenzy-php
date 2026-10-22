<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\PollResultsSummary;
use Sequenzy\Types\EngagementStats;

class GetStatsSequencesResponseStepsItem extends JsonSerializableType
{
    /**
     * @var ?int $failedCount Number of subscribers that failed at this step.
     */
    #[JsonProperty('failedCount')]
    public ?int $failedCount;

    /**
     * @var ?array<GetStatsSequencesResponseStepsItemFailedSubscribersItem> $failedSubscribers Up to 20 most recent failed subscribers for this step.
     */
    #[JsonProperty('failedSubscribers'), ArrayType([GetStatsSequencesResponseStepsItemFailedSubscribersItem::class])]
    public ?array $failedSubscribers;

    /**
     * @var ?string $nodeId Node ID for this email step.
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?array<PollResultsSummary> $polls Lifetime Poll and NPS summaries for this step, in the same shape as the campaign stats polls. Each subscriber counts once per poll block with their latest answer. Not limited by period, start or end. Omitted when the step has no responses.
     */
    #[JsonProperty('polls'), ArrayType([PollResultsSummary::class])]
    public ?array $polls;

    /**
     * @var ?EngagementStats $stats
     */
    #[JsonProperty('stats')]
    public ?EngagementStats $stats;

    /**
     * @var ?int $step Step number.
     */
    #[JsonProperty('step')]
    public ?int $step;

    /**
     * @var ?string $subject Email subject line.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @param array{
     *   failedCount?: ?int,
     *   failedSubscribers?: ?array<GetStatsSequencesResponseStepsItemFailedSubscribersItem>,
     *   nodeId?: ?string,
     *   polls?: ?array<PollResultsSummary>,
     *   stats?: ?EngagementStats,
     *   step?: ?int,
     *   subject?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->failedCount = $values['failedCount'] ?? null;
        $this->failedSubscribers = $values['failedSubscribers'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->polls = $values['polls'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->step = $values['step'] ?? null;
        $this->subject = $values['subject'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
