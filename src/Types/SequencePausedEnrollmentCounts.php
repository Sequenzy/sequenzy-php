<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Live count of enrollments held by a per-subscriber pause (POST /sequences/{sequenceId}/enrollments/pause). Reported separately because enrollmentCounts covers only active and waiting enrollments.
 */
class SequencePausedEnrollmentCounts extends JsonSerializableType
{
    /**
     * @var array<SequencePausedEnrollmentCountsByCurrentNodeItem> $byCurrentNode Paused enrollments grouped by the step they are held on.
     */
    #[JsonProperty('byCurrentNode'), ArrayType([SequencePausedEnrollmentCountsByCurrentNodeItem::class])]
    public array $byCurrentNode;

    /**
     * @var int $total Paused enrollments in the sequence.
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   byCurrentNode: array<SequencePausedEnrollmentCountsByCurrentNodeItem>,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->byCurrentNode = $values['byCurrentNode'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
