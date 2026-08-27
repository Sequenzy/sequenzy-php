<?php

namespace Sequenzy\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TagDefinition;
use Sequenzy\Core\Types\ArrayType;

class ListTagsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<TagDefinition> $tags
     */
    #[JsonProperty('tags'), ArrayType([TagDefinition::class])]
    public ?array $tags;

    /**
     * @param array{
     *   success?: ?bool,
     *   tags?: ?array<TagDefinition>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
