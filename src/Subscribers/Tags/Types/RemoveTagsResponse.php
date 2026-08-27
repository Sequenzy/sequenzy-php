<?php

namespace Sequenzy\Subscribers\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RemoveTagsResponse extends JsonSerializableType
{
    /**
     * @var ?RemoveTagsResponseSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?RemoveTagsResponseSubscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?RemoveTagsResponseTag $tag
     */
    #[JsonProperty('tag')]
    public ?RemoveTagsResponseTag $tag;

    /**
     * @param array{
     *   subscriber?: ?RemoveTagsResponseSubscriber,
     *   success?: ?bool,
     *   tag?: ?RemoveTagsResponseTag,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subscriber = $values['subscriber'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tag = $values['tag'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
