<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

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
     * @param array{
     *   events?: ?array<TriggerBulkEventsResponseEventsItem>,
     *   optIn?: ?TriggerBulkEventsResponseOptIn,
     *   subscriber?: ?TriggerBulkEventsResponseSubscriber,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->events = $values['events'] ?? null;
        $this->optIn = $values['optIn'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
