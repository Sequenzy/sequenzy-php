<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionPushResultChanges extends JsonSerializableType
{
    /**
     * @var ?SequenceDefinitionPushResultChangesConnections $connections
     */
    #[JsonProperty('connections')]
    public ?SequenceDefinitionPushResultChangesConnections $connections;

    /**
     * @var ?array<string> $sequence Changed sequence fields, such as name or settings.sendingWindow.
     */
    #[JsonProperty('sequence'), ArrayType(['string'])]
    public ?array $sequence;

    /**
     * @var ?SequenceDefinitionPushResultChangesSteps $steps
     */
    #[JsonProperty('steps')]
    public ?SequenceDefinitionPushResultChangesSteps $steps;

    /**
     * @param array{
     *   connections?: ?SequenceDefinitionPushResultChangesConnections,
     *   sequence?: ?array<string>,
     *   steps?: ?SequenceDefinitionPushResultChangesSteps,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->connections = $values['connections'] ?? null;
        $this->sequence = $values['sequence'] ?? null;
        $this->steps = $values['steps'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
