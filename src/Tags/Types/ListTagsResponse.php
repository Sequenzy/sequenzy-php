<?php

namespace Sequenzy\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TagDefinition;
use Sequenzy\Core\Types\ArrayType;

class ListTagsResponse extends JsonSerializableType
{
    /**
     * @var ?ListTagsResponseChangeInProgress $changeInProgress Present only while a rename or merge of a tag on more than 20,000 subscribers is still moving them. Renames, merges and deletes are refused until it is gone.
     */
    #[JsonProperty('changeInProgress')]
    public ?ListTagsResponseChangeInProgress $changeInProgress;

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
     *   changeInProgress?: ?ListTagsResponseChangeInProgress,
     *   success?: ?bool,
     *   tags?: ?array<TagDefinition>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->changeInProgress = $values['changeInProgress'] ?? null;
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
