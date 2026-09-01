<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentGetResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceEnrollmentGetResponseEnrollment $enrollment
     */
    #[JsonProperty('enrollment')]
    public ?SequenceEnrollmentGetResponseEnrollment $enrollment;

    /**
     * @var ?value-of<SequenceEnrollmentGetResponseHistorySource> $historySource Where the branch history came from.
     */
    #[JsonProperty('historySource')]
    public ?string $historySource;

    /**
     * @var ?array<SequenceEnrollmentGetResponseNodeHistoryItem> $nodeHistory ClickHouse graph-walk events for this token, oldest first.
     */
    #[JsonProperty('nodeHistory'), ArrayType([SequenceEnrollmentGetResponseNodeHistoryItem::class])]
    public ?array $nodeHistory;

    /**
     * @var ?int $nodeHistoryLimit Maximum number of node events returned.
     */
    #[JsonProperty('nodeHistoryLimit')]
    public ?int $nodeHistoryLimit;

    /**
     * @var ?bool $nodeHistoryTruncated Whether additional node events exist beyond the returned bounded history.
     */
    #[JsonProperty('nodeHistoryTruncated')]
    public ?bool $nodeHistoryTruncated;

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
     * @var ?SequenceStopCondition $stopCondition
     */
    #[JsonProperty('stopCondition')]
    public ?SequenceStopCondition $stopCondition;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   enrollment?: ?SequenceEnrollmentGetResponseEnrollment,
     *   historySource?: ?value-of<SequenceEnrollmentGetResponseHistorySource>,
     *   nodeHistory?: ?array<SequenceEnrollmentGetResponseNodeHistoryItem>,
     *   nodeHistoryLimit?: ?int,
     *   nodeHistoryTruncated?: ?bool,
     *   sequenceId?: ?string,
     *   sequenceName?: ?string,
     *   stopCondition?: ?SequenceStopCondition,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enrollment = $values['enrollment'] ?? null;
        $this->historySource = $values['historySource'] ?? null;
        $this->nodeHistory = $values['nodeHistory'] ?? null;
        $this->nodeHistoryLimit = $values['nodeHistoryLimit'] ?? null;
        $this->nodeHistoryTruncated = $values['nodeHistoryTruncated'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->sequenceName = $values['sequenceName'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
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
