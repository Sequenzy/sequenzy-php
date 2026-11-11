<?php

namespace Sequenzy\Subscribers\Tags\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceTriggersSkippedReason;
use Sequenzy\Core\Types\ArrayType;

class AddTagsResponse extends JsonSerializableType
{
    /**
     * @var ?AddTagsResponseOptIn $optIn Present when this request created a brand-new subscriber while workspace double opt-in is enabled. The tag is applied, but the subscriber stays pending and tag automations wait until they confirm.
     */
    #[JsonProperty('optIn')]
    public ?AddTagsResponseOptIn $optIn;

    /**
     * @var ?bool $sequenceTriggersRan
     */
    #[JsonProperty('sequenceTriggersRan')]
    public ?bool $sequenceTriggersRan;

    /**
     * @var ?value-of<SequenceTriggersSkippedReason> $sequenceTriggersSkippedReason
     */
    #[JsonProperty('sequenceTriggersSkippedReason')]
    public ?string $sequenceTriggersSkippedReason;

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
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   optIn?: ?AddTagsResponseOptIn,
     *   sequenceTriggersRan?: ?bool,
     *   sequenceTriggersSkippedReason?: ?value-of<SequenceTriggersSkippedReason>,
     *   subscriber?: ?AddTagsResponseSubscriber,
     *   success?: ?bool,
     *   tag?: ?AddTagsResponseTag,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->optIn = $values['optIn'] ?? null;
        $this->sequenceTriggersRan = $values['sequenceTriggersRan'] ?? null;
        $this->sequenceTriggersSkippedReason = $values['sequenceTriggersSkippedReason'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
