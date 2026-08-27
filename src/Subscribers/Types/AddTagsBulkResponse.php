<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AddTagsBulkResponse extends JsonSerializableType
{
    /**
     * @var ?AddTagsBulkResponseOptIn $optIn Present when this request created a brand-new subscriber while workspace double opt-in is enabled. The tags are applied, but the subscriber stays pending and tag automations wait until they confirm.
     */
    #[JsonProperty('optIn')]
    public ?AddTagsBulkResponseOptIn $optIn;

    /**
     * @var ?AddTagsBulkResponseSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?AddTagsBulkResponseSubscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?AddTagsBulkResponseTags $tags
     */
    #[JsonProperty('tags')]
    public ?AddTagsBulkResponseTags $tags;

    /**
     * @param array{
     *   optIn?: ?AddTagsBulkResponseOptIn,
     *   subscriber?: ?AddTagsBulkResponseSubscriber,
     *   success?: ?bool,
     *   tags?: ?AddTagsBulkResponseTags,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->optIn = $values['optIn'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
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
