<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceTriggersSkippedReason;
use Sequenzy\Core\Types\ArrayType;

class AddTagsBulkResponse extends JsonSerializableType
{
    /**
     * @var ?AddTagsBulkResponseOptIn $optIn Present when this request created a brand-new subscriber while workspace double opt-in is enabled. The tags are applied, but the subscriber stays pending and tag automations wait until they confirm.
     */
    #[JsonProperty('optIn')]
    public ?AddTagsBulkResponseOptIn $optIn;

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
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   optIn?: ?AddTagsBulkResponseOptIn,
     *   sequenceTriggersRan?: ?bool,
     *   sequenceTriggersSkippedReason?: ?value-of<SequenceTriggersSkippedReason>,
     *   subscriber?: ?AddTagsBulkResponseSubscriber,
     *   success?: ?bool,
     *   tags?: ?AddTagsBulkResponseTags,
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
        $this->tags = $values['tags'] ?? null;
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
