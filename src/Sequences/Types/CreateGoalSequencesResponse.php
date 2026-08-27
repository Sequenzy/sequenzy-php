<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceGoal;
use Sequenzy\Core\Json\JsonProperty;

class CreateGoalSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceGoal $goal
     */
    #[JsonProperty('goal')]
    public ?SequenceGoal $goal;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   goal?: ?SequenceGoal,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->goal = $values['goal'] ?? null;
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
