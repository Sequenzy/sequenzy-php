<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\SequenceTriggersSkippedReason;

class TriggerBulkEventsResponse extends JsonSerializableType
{
    /**
     * @var ?array<TriggerBulkEventsResponseEventsItem> $events
     */
    #[JsonProperty('events'), ArrayType([TriggerBulkEventsResponseEventsItem::class])]
    public ?array $events;

    /**
     * @var ?TriggerBulkEventsResponseOptIn $optIn Present when this request created a brand-new subscriber while workspace double opt-in is enabled. The subscriber stays pending and matching sequences wait until they confirm.
     */
    #[JsonProperty('optIn')]
    public ?TriggerBulkEventsResponseOptIn $optIn;

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
     * @var ?TriggerBulkEventsResponseSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?TriggerBulkEventsResponseSubscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   events?: ?array<TriggerBulkEventsResponseEventsItem>,
     *   optIn?: ?TriggerBulkEventsResponseOptIn,
     *   sequenceTriggersRan?: ?bool,
     *   sequenceTriggersSkippedReason?: ?value-of<SequenceTriggersSkippedReason>,
     *   subscriber?: ?TriggerBulkEventsResponseSubscriber,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->events = $values['events'] ?? null;
        $this->optIn = $values['optIn'] ?? null;
        $this->sequenceTriggersRan = $values['sequenceTriggersRan'] ?? null;
        $this->sequenceTriggersSkippedReason = $values['sequenceTriggersSkippedReason'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
        $this->success = $values['success'] ?? null;
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
