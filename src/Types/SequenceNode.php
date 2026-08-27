<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class SequenceNode extends JsonSerializableType
{
    /**
     * @var ?string $automationId
     */
    #[JsonProperty('automationId')]
    public ?string $automationId;

    /**
     * @var ?array<string, mixed> $config
     */
    #[JsonProperty('config'), ArrayType(['string' => 'mixed'])]
    public ?array $config;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $nodeType
     */
    #[JsonProperty('nodeType')]
    public ?string $nodeType;

    /**
     * @var ?SequencePosition $position
     */
    #[JsonProperty('position')]
    public ?SequencePosition $position;

    /**
     * @var ?float $structuralStepNumber Graph-derived email depth. Present on action_email and action_ab_test nodes reachable from a trigger; parallel branch emails intentionally share a depth.
     */
    #[JsonProperty('structuralStepNumber')]
    public ?float $structuralStepNumber;

    /**
     * @var ?DateTime $updatedAt Node concurrency timestamp. Return this as expectedUpdatedAt when patching the node.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?SequenceNodeUpdateHints $updateHints Type-aware guidance for safely patching this node.
     */
    #[JsonProperty('updateHints')]
    public ?SequenceNodeUpdateHints $updateHints;

    /**
     * @param array{
     *   automationId?: ?string,
     *   config?: ?array<string, mixed>,
     *   id?: ?string,
     *   nodeType?: ?string,
     *   position?: ?SequencePosition,
     *   structuralStepNumber?: ?float,
     *   updatedAt?: ?DateTime,
     *   updateHints?: ?SequenceNodeUpdateHints,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automationId = $values['automationId'] ?? null;
        $this->config = $values['config'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->nodeType = $values['nodeType'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->structuralStepNumber = $values['structuralStepNumber'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->updateHints = $values['updateHints'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
