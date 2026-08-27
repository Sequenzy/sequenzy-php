<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentListResponse extends JsonSerializableType
{
    /**
     * @var ?array<SequenceEnrollmentListResponseEnrollmentsItem> $enrollments
     */
    #[JsonProperty('enrollments'), ArrayType([SequenceEnrollmentListResponseEnrollmentsItem::class])]
    public ?array $enrollments;

    /**
     * @var ?SequenceEnrollmentListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?SequenceEnrollmentListResponsePagination $pagination;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?string $sequenceName
     */
    #[JsonProperty('sequenceName')]
    public ?string $sequenceName;

    /**
     * @var ?array<string> $statuses Enrollment statuses included in this response.
     */
    #[JsonProperty('statuses'), ArrayType(['string'])]
    public ?array $statuses;

    /**
     * @var ?SequenceStopCondition $stopCondition The sequence's single configured stop condition, including any matchConfig event-property filters or field comparison. A sequence holds exactly one, so a stop event with any other name never applies. It is re-evaluated when an enrollment next runs a step, not when its event arrives.
     */
    #[JsonProperty('stopCondition')]
    public ?SequenceStopCondition $stopCondition;

    /**
     * @var ?int $stopConditionMatchEvaluatedCount How many enrollments in this page were actually evaluated for a current stop-condition match. 0 when stopConditionMatch was not requested, the sequence has no stop condition, or no returned enrollment was still active or waiting.
     */
    #[JsonProperty('stopConditionMatchEvaluatedCount')]
    public ?int $stopConditionMatchEvaluatedCount;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   enrollments?: ?array<SequenceEnrollmentListResponseEnrollmentsItem>,
     *   pagination?: ?SequenceEnrollmentListResponsePagination,
     *   sequenceId?: ?string,
     *   sequenceName?: ?string,
     *   statuses?: ?array<string>,
     *   stopCondition?: ?SequenceStopCondition,
     *   stopConditionMatchEvaluatedCount?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enrollments = $values['enrollments'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->sequenceName = $values['sequenceName'] ?? null;
        $this->statuses = $values['statuses'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
        $this->stopConditionMatchEvaluatedCount = $values['stopConditionMatchEvaluatedCount'] ?? null;
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
