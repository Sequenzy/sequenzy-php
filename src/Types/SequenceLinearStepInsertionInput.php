<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceLinearStepInsertionInput extends JsonSerializableType
{
    /**
     * @var ?string $afterNodeId Existing sequence node ID to insert after. Omit only to append to an unambiguous linear tail.
     */
    #[JsonProperty('afterNodeId')]
    public ?string $afterNodeId;

    /**
     * @var array<SequenceBranchPathStepInput> $steps New linear steps to insert. Supports addable step types that do not require companion records; multi-path branches use the branch payload. Email steps require subject plus blocks or html. Inserted email steps inherit the effective identity of the nearest sequence email unless the step sets its own sender fields. After a branch merge, only identity fields shared by every incoming path are inherited; conflicting fields use sequence or company defaults.
     */
    #[JsonProperty('steps'), ArrayType([SequenceBranchPathStepInput::class])]
    public array $steps;

    /**
     * @param array{
     *   steps: array<SequenceBranchPathStepInput>,
     *   afterNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->afterNodeId = $values['afterNodeId'] ?? null;
        $this->steps = $values['steps'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
