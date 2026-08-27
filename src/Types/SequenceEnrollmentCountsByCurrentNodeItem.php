<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentCountsByCurrentNodeItem extends JsonSerializableType
{
    /**
     * @var int $active Active enrollment-token count at this node.
     */
    #[JsonProperty('active')]
    public int $active;

    /**
     * @var string $currentNodeId Current sequence node ID.
     */
    #[JsonProperty('currentNodeId')]
    public string $currentNodeId;

    /**
     * @var ?string $currentNodeLabel Current sequence node label or email subject when available.
     */
    #[JsonProperty('currentNodeLabel')]
    public ?string $currentNodeLabel;

    /**
     * @var bool $currentNodeMissing Whether the current node no longer exists in the sequence graph.
     */
    #[JsonProperty('currentNodeMissing')]
    public bool $currentNodeMissing;

    /**
     * @var ?string $currentNodeType Current sequence node type. Omitted when the node no longer exists in the graph.
     */
    #[JsonProperty('currentNodeType')]
    public ?string $currentNodeType;

    /**
     * @var int $total Total active plus waiting enrollment-token count at this node.
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $waiting Waiting enrollment-token count at this node.
     */
    #[JsonProperty('waiting')]
    public int $waiting;

    /**
     * @param array{
     *   active: int,
     *   currentNodeId: string,
     *   currentNodeMissing: bool,
     *   total: int,
     *   waiting: int,
     *   currentNodeLabel?: ?string,
     *   currentNodeType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->active = $values['active'];
        $this->currentNodeId = $values['currentNodeId'];
        $this->currentNodeLabel = $values['currentNodeLabel'] ?? null;
        $this->currentNodeMissing = $values['currentNodeMissing'];
        $this->currentNodeType = $values['currentNodeType'] ?? null;
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
