<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceEnrollmentCounts;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\RecommendationMetrics;
use Sequenzy\Types\EngagementStats;
use Sequenzy\Core\Types\ArrayType;

class GetStatsSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceEnrollmentCounts $enrollmentCounts
     */
    #[JsonProperty('enrollmentCounts')]
    public ?SequenceEnrollmentCounts $enrollmentCounts;

    /**
     * @var ?GetStatsSequencesResponseEnrollmentSkipped $enrollmentSkipped Trigger matches where the contact could not be enrolled because they are unsubscribed or bounced. Defaults to the last 30 days when no explicit time range is provided.
     */
    #[JsonProperty('enrollmentSkipped')]
    public ?GetStatsSequencesResponseEnrollmentSkipped $enrollmentSkipped;

    /**
     * @var ?string $period Echoed back when `period` is provided.
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?RecommendationMetrics $recommendations
     */
    #[JsonProperty('recommendations')]
    public ?RecommendationMetrics $recommendations;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?EngagementStats $stats
     */
    #[JsonProperty('stats')]
    public ?EngagementStats $stats;

    /**
     * @var ?array<GetStatsSequencesResponseStepsItem> $steps Per-email-step metrics, ordered by position in the sequence.
     */
    #[JsonProperty('steps'), ArrayType([GetStatsSequencesResponseStepsItem::class])]
    public ?array $steps;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   enrollmentCounts?: ?SequenceEnrollmentCounts,
     *   enrollmentSkipped?: ?GetStatsSequencesResponseEnrollmentSkipped,
     *   period?: ?string,
     *   recommendations?: ?RecommendationMetrics,
     *   sequenceId?: ?string,
     *   stats?: ?EngagementStats,
     *   steps?: ?array<GetStatsSequencesResponseStepsItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enrollmentCounts = $values['enrollmentCounts'] ?? null;
        $this->enrollmentSkipped = $values['enrollmentSkipped'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->recommendations = $values['recommendations'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->steps = $values['steps'] ?? null;
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
