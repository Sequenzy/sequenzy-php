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
     * @var ?bool $subscriberFound False when no subscriber matched the email or externalId. Nothing was created or changed, subscriber.id is empty and subscriber.tags is empty.
     */
    #[JsonProperty('subscriberFound')]
    public ?bool $subscriberFound;

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
     *   subscriberFound?: ?bool,
     *   success?: ?bool,
     *   tag?: ?RemoveTagsResponseTag,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subscriber = $values['subscriber'] ?? null;
        $this->subscriberFound = $values['subscriberFound'] ?? null;
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
