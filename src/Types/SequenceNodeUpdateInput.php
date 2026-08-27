<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SequenceNodeUpdateInput extends JsonSerializableType
{
    /**
     * @var SequenceNodeUpdateInputChanges $changes Type-aware node patch. Use the editableFields and notes from the node's updateHints. Omitted fields are preserved. For action_email nodes, a blocks patch that omits emailPreset never changes the step's format - see blocks on SequenceEmailUpdateInput.
     */
    #[JsonProperty('changes')]
    public SequenceNodeUpdateInputChanges $changes;

    /**
     * @var ?DateTime $expectedUpdatedAt Optional optimistic-concurrency token from the node's latest updatedAt or updateHints.expectedUpdatedAt value. MCP clients require this field.
     */
    #[JsonProperty('expectedUpdatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expectedUpdatedAt;

    /**
     * @var string $nodeId Existing sequence node ID returned by get sequence.
     */
    #[JsonProperty('nodeId')]
    public string $nodeId;

    /**
     * @param array{
     *   changes: SequenceNodeUpdateInputChanges,
     *   nodeId: string,
     *   expectedUpdatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->changes = $values['changes'];
        $this->expectedUpdatedAt = $values['expectedUpdatedAt'] ?? null;
        $this->nodeId = $values['nodeId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
