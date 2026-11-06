<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionPushResultChangesSteps extends JsonSerializableType
{
    /**
     * @var ?array<string> $added
     */
    #[JsonProperty('added'), ArrayType(['string'])]
    public ?array $added;

    /**
     * @var ?array<SequenceDefinitionPushResultChangesStepsChangedItem> $changed
     */
    #[JsonProperty('changed'), ArrayType([SequenceDefinitionPushResultChangesStepsChangedItem::class])]
    public ?array $changed;

    /**
     * @var ?array<SequenceDefinitionPushResultChangesStepsRemovedItem> $removed
     */
    #[JsonProperty('removed'), ArrayType([SequenceDefinitionPushResultChangesStepsRemovedItem::class])]
    public ?array $removed;

    /**
     * @param array{
     *   added?: ?array<string>,
     *   changed?: ?array<SequenceDefinitionPushResultChangesStepsChangedItem>,
     *   removed?: ?array<SequenceDefinitionPushResultChangesStepsRemovedItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->added = $values['added'] ?? null;
        $this->changed = $values['changed'] ?? null;
        $this->removed = $values['removed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
