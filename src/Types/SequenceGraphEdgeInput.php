<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceGraphEdgeInput extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $condition Exact branch-lane condition for this edge. Omit or set null for an unconditional edge.
     */
    #[JsonProperty('condition'), ArrayType(['string' => 'mixed'])]
    public ?array $condition;

    /**
     * @var string $sourceNodeId Existing source node ID.
     */
    #[JsonProperty('sourceNodeId')]
    public string $sourceNodeId;

    /**
     * @var string $targetNodeId Existing target node ID.
     */
    #[JsonProperty('targetNodeId')]
    public string $targetNodeId;

    /**
     * @param array{
     *   sourceNodeId: string,
     *   targetNodeId: string,
     *   condition?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->condition = $values['condition'] ?? null;
        $this->sourceNodeId = $values['sourceNodeId'];
        $this->targetNodeId = $values['targetNodeId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
