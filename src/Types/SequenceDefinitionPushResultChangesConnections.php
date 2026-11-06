<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionPushResultChangesConnections extends JsonSerializableType
{
    /**
     * @var ?array<SequenceDefinitionPushResultChangesConnectionsAddedItem> $added
     */
    #[JsonProperty('added'), ArrayType([SequenceDefinitionPushResultChangesConnectionsAddedItem::class])]
    public ?array $added;

    /**
     * @var ?array<SequenceDefinitionPushResultChangesConnectionsRemovedItem> $removed
     */
    #[JsonProperty('removed'), ArrayType([SequenceDefinitionPushResultChangesConnectionsRemovedItem::class])]
    public ?array $removed;

    /**
     * @param array{
     *   added?: ?array<SequenceDefinitionPushResultChangesConnectionsAddedItem>,
     *   removed?: ?array<SequenceDefinitionPushResultChangesConnectionsRemovedItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->added = $values['added'] ?? null;
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
