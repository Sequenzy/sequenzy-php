<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceGraphEditInput extends JsonSerializableType
{
    /**
     * @var value-of<SequenceGraphEditInputAction> $action Structural graph operation to perform.
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?string $afterNodeId Insert the moved or duplicated node immediately after this node. Mutually exclusive with beforeNodeId.
     */
    #[JsonProperty('afterNodeId')]
    public ?string $afterNodeId;

    /**
     * @var ?string $beforeNodeId Insert the moved or duplicated node immediately before this node. Mutually exclusive with afterNodeId.
     */
    #[JsonProperty('beforeNodeId')]
    public ?string $beforeNodeId;

    /**
     * @var ?array<SequenceGraphEdgeInput> $edges Complete replacement topology for replace_edges. Also supported when deleting a split node whose continuation cannot be inferred safely.
     */
    #[JsonProperty('edges'), ArrayType([SequenceGraphEdgeInput::class])]
    public ?array $edges;

    /**
     * @var string $expectedRevision graphRevision from the latest get-sequence response. The update is rejected if the graph changed after it was read.
     */
    #[JsonProperty('expectedRevision')]
    public string $expectedRevision;

    /**
     * @var ?string $nodeId Existing node to move, delete, or duplicate.
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @param array{
     *   action: value-of<SequenceGraphEditInputAction>,
     *   expectedRevision: string,
     *   afterNodeId?: ?string,
     *   beforeNodeId?: ?string,
     *   edges?: ?array<SequenceGraphEdgeInput>,
     *   nodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->afterNodeId = $values['afterNodeId'] ?? null;
        $this->beforeNodeId = $values['beforeNodeId'] ?? null;
        $this->edges = $values['edges'] ?? null;
        $this->expectedRevision = $values['expectedRevision'];
        $this->nodeId = $values['nodeId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
