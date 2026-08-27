<?php

namespace Sequenzy\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EventSchema;
use Sequenzy\Core\Types\ArrayType;

class GetSchemasEventsResponse extends JsonSerializableType
{
    /**
     * @var ?string $eventName Normalized name of the event described, or null when listing every documented event.
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?array<EventSchema> $events
     */
    #[JsonProperty('events'), ArrayType([EventSchema::class])]
    public ?array $events;

    /**
     * @var ?string $note Present in listing mode only.
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   eventName?: ?string,
     *   events?: ?array<EventSchema>,
     *   note?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventName = $values['eventName'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->note = $values['note'] ?? null;
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
