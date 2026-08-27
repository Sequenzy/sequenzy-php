<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceGoal;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListGoalsSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?array<SequenceGoal> $goals
     */
    #[JsonProperty('goals'), ArrayType([SequenceGoal::class])]
    public ?array $goals;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   goals?: ?array<SequenceGoal>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->goals = $values['goals'] ?? null;
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
