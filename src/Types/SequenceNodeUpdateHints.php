<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Type-aware guidance for safely patching this node.
 */
class SequenceNodeUpdateHints extends JsonSerializableType
{
    /**
     * @var ?array<string> $editableFields
     */
    #[JsonProperty('editableFields'), ArrayType(['string'])]
    public ?array $editableFields;

    /**
     * @var ?DateTime $expectedUpdatedAt Ready-to-return optimistic-concurrency token for update_sequence_node or update_sequence_nodes.
     */
    #[JsonProperty('expectedUpdatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expectedUpdatedAt;

    /**
     * @var ?array<string> $managedFields
     */
    #[JsonProperty('managedFields'), ArrayType(['string'])]
    public ?array $managedFields;

    /**
     * @var ?array<string> $notes
     */
    #[JsonProperty('notes'), ArrayType(['string'])]
    public ?array $notes;

    /**
     * @var ?string $tool
     */
    #[JsonProperty('tool')]
    public ?string $tool;

    /**
     * @param array{
     *   editableFields?: ?array<string>,
     *   expectedUpdatedAt?: ?DateTime,
     *   managedFields?: ?array<string>,
     *   notes?: ?array<string>,
     *   tool?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->editableFields = $values['editableFields'] ?? null;
        $this->expectedUpdatedAt = $values['expectedUpdatedAt'] ?? null;
        $this->managedFields = $values['managedFields'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->tool = $values['tool'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
