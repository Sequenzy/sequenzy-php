<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Point-in-time counts of active and waiting enrollment tokens for a sequence. This live snapshot is not limited by historical period, start, or end filters. Counts represent enrollment runs, not necessarily distinct subscribers.
 */
class SequenceEnrollmentCounts extends JsonSerializableType
{
    /**
     * @var int $active Active enrollment-token count.
     */
    #[JsonProperty('active')]
    public int $active;

    /**
     * @var array<SequenceEnrollmentCountsByCurrentNodeItem> $byCurrentNode Active and waiting enrollment counts grouped by current sequence node.
     */
    #[JsonProperty('byCurrentNode'), ArrayType([SequenceEnrollmentCountsByCurrentNodeItem::class])]
    public array $byCurrentNode;

    /**
     * @var int $total Total active plus waiting enrollment-token count.
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $waiting Waiting enrollment-token count.
     */
    #[JsonProperty('waiting')]
    public int $waiting;

    /**
     * @param array{
     *   active: int,
     *   byCurrentNode: array<SequenceEnrollmentCountsByCurrentNodeItem>,
     *   total: int,
     *   waiting: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->active = $values['active'];
        $this->byCurrentNode = $values['byCurrentNode'];
        $this->total = $values['total'];
        $this->waiting = $values['waiting'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
