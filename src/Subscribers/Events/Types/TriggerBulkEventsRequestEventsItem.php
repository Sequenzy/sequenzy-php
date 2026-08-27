<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class TriggerBulkEventsRequestEventsItem extends JsonSerializableType
{
    /**
     * @var ?string $eventId Caller-owned event ID that makes a re-run idempotent on both the live and historical paths. On the live path a repeated ID is skipped and its response entry carries duplicate=true.
     */
    #[JsonProperty('eventId')]
    public ?string $eventId;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?DateTime $occurredAt When this event actually happened. Defaults to now. When every event in the batch is more than an hour old the batch is imported as history in one idempotent write, running no sequences, sync rules, waiting steps, goal conversions or webhooks.
     */
    #[JsonProperty('occurredAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $occurredAt;

    /**
     * @var ?array<string, mixed> $properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @param array{
     *   name: string,
     *   eventId?: ?string,
     *   occurredAt?: ?DateTime,
     *   properties?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventId = $values['eventId'] ?? null;
        $this->name = $values['name'];
        $this->occurredAt = $values['occurredAt'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
