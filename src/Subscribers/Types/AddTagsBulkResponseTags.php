<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AddTagsBulkResponseTags extends JsonSerializableType
{
    /**
     * @var ?array<string> $added Tag names that were added
     */
    #[JsonProperty('added'), ArrayType(['string'])]
    public ?array $added;

    /**
     * @var ?array<string> $created Tag definitions that were newly created
     */
    #[JsonProperty('created'), ArrayType(['string'])]
    public ?array $created;

    /**
     * @param array{
     *   added?: ?array<string>,
     *   created?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->added = $values['added'] ?? null;
        $this->created = $values['created'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
