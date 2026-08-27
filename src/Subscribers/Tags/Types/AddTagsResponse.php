<?php

namespace Sequenzy\Subscribers\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AddTagsResponse extends JsonSerializableType
{
    /**
     * @var ?AddTagsResponseOptIn $optIn Present when this request created a brand-new subscriber while workspace double opt-in is enabled. The tag is applied, but the subscriber stays pending and tag automations wait until they confirm.
     */
    #[JsonProperty('optIn')]
    public ?AddTagsResponseOptIn $optIn;

    /**
     * @var ?AddTagsResponseSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?AddTagsResponseSubscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?AddTagsResponseTag $tag
     */
    #[JsonProperty('tag')]
    public ?AddTagsResponseTag $tag;

    /**
     * @param array{
     *   optIn?: ?AddTagsResponseOptIn,
     *   subscriber?: ?AddTagsResponseSubscriber,
     *   success?: ?bool,
     *   tag?: ?AddTagsResponseTag,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->optIn = $values['optIn'] ?? null;
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
