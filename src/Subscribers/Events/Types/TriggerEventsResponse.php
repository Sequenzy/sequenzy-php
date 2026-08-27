<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TriggerEventsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $duplicate Present and true when a live event's supplied eventId was already recorded for this contact and event name. Nothing was written and no side effects ran; event holds the existing event. Historical responses use duplicates instead.
     */
    #[JsonProperty('duplicate')]
    public ?bool $duplicate;

    /**
     * @var ?int $duplicates Historical event rows skipped because their idempotency receipt already existed.
     */
    #[JsonProperty('duplicates')]
    public ?int $duplicates;

    /**
     * @var ?TriggerEventsResponseEvent $event
     */
    #[JsonProperty('event')]
    public ?TriggerEventsResponseEvent $event;

    /**
     * @var ?array<TriggerEventsResponseEventsItem> $events Historical event results. Present instead of event on the historical path.
     */
    #[JsonProperty('events'), ArrayType([TriggerEventsResponseEventsItem::class])]
    public ?array $events;

    /**
     * @var ?bool $historical Present and true when occurredAt selected the historical import path.
     */
    #[JsonProperty('historical')]
    public ?bool $historical;

    /**
     * @var ?int $inserted Historical event rows inserted by this request.
     */
    #[JsonProperty('inserted')]
    public ?int $inserted;

    /**
     * @var ?TriggerEventsResponseOptIn $optIn Present when this event created a brand-new subscriber while workspace double opt-in is enabled. The subscriber stays pending and matching sequences wait until they confirm.
     */
    #[JsonProperty('optIn')]
    public ?TriggerEventsResponseOptIn $optIn;

    /**
     * @var ?array<string> $sideEffectFailures Present when the event was recorded but one or more side-effect stages (e.g. apply-sync-rules, trigger-event-automations) failed. Retry-sensitive callers should treat these as partial failures.
     */
    #[JsonProperty('sideEffectFailures'), ArrayType(['string'])]
    public ?array $sideEffectFailures;

    /**
     * @var ?TriggerEventsResponseSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?TriggerEventsResponseSubscriber $subscriber;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   duplicate?: ?bool,
     *   duplicates?: ?int,
     *   event?: ?TriggerEventsResponseEvent,
     *   events?: ?array<TriggerEventsResponseEventsItem>,
     *   historical?: ?bool,
     *   inserted?: ?int,
     *   optIn?: ?TriggerEventsResponseOptIn,
     *   sideEffectFailures?: ?array<string>,
     *   subscriber?: ?TriggerEventsResponseSubscriber,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->duplicate = $values['duplicate'] ?? null;
        $this->duplicates = $values['duplicates'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->historical = $values['historical'] ?? null;
        $this->inserted = $values['inserted'] ?? null;
        $this->optIn = $values['optIn'] ?? null;
        $this->sideEffectFailures = $values['sideEffectFailures'] ?? null;
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
