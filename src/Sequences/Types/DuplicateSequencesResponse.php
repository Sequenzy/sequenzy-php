<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceGraphEdgeInput;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\SequenceNode;
use Sequenzy\Types\SequenceSummary;

class DuplicateSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?array<SequenceGraphEdgeInput> $edges
     */
    #[JsonProperty('edges'), ArrayType([SequenceGraphEdgeInput::class])]
    public ?array $edges;

    /**
     * @var ?array<SequenceNode> $nodes
     */
    #[JsonProperty('nodes'), ArrayType([SequenceNode::class])]
    public ?array $nodes;

    /**
     * @var ?SequenceSummary $sequence
     */
    #[JsonProperty('sequence')]
    public ?SequenceSummary $sequence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   edges?: ?array<SequenceGraphEdgeInput>,
     *   nodes?: ?array<SequenceNode>,
     *   sequence?: ?SequenceSummary,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->edges = $values['edges'] ?? null;
        $this->nodes = $values['nodes'] ?? null;
        $this->sequence = $values['sequence'] ?? null;
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
