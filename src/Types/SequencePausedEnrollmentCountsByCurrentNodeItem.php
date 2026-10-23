<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequencePausedEnrollmentCountsByCurrentNodeItem extends JsonSerializableType
{
    /**
     * @var int $count
     */
    #[JsonProperty('count')]
    public int $count;

    /**
     * @var string $currentNodeId
     */
    #[JsonProperty('currentNodeId')]
    public string $currentNodeId;

    /**
     * @var bool $currentNodeMissing Whether that step no longer exists in the sequence graph.
     */
    #[JsonProperty('currentNodeMissing')]
    public bool $currentNodeMissing;

    /**
     * @param array{
     *   count: int,
     *   currentNodeId: string,
     *   currentNodeMissing: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'];
        $this->currentNodeId = $values['currentNodeId'];
        $this->currentNodeMissing = $values['currentNodeMissing'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
