<?php

namespace Sequenzy\Subscribers\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RemoveTagsResponseTag extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $removed Whether the tag was removed from the subscriber
     */
    #[JsonProperty('removed')]
    public ?bool $removed;

    /**
     * @param array{
     *   name?: ?string,
     *   removed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
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
