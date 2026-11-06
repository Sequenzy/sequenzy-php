<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceDefinitionPushResultSequence extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $key
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?value-of<SequenceDefinitionPushResultSequenceManagedBy> $managedBy
     */
    #[JsonProperty('managedBy')]
    public ?string $managedBy;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   id?: ?string,
     *   key?: ?string,
     *   managedBy?: ?value-of<SequenceDefinitionPushResultSequenceManagedBy>,
     *   name?: ?string,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->managedBy = $values['managedBy'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
