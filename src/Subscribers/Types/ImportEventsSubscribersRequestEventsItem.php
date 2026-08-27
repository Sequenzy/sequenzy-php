<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class ImportEventsSubscribersRequestEventsItem extends JsonSerializableType
{
    /**
     * @var ?string $email Subscriber email address. Required when the event may create a new contact; null is treated as absent.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var string $eventId Required source-owned id for this event, used as an idempotency key so re-running the import records nothing twice.
     */
    #[JsonProperty('eventId')]
    public string $eventId;

    /**
     * @var ?string $externalId Customer-owned subscriber ID. It can be used alone only when it resolves to an existing contact; null is treated as absent.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var string $name Event name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?DateTime $occurredAt When the event happened (ISO 8601, null treated as absent). Only when every row for that contact is more than an hour old is the group historical; any recent row makes the whole group live.
     */
    #[JsonProperty('occurredAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $occurredAt;

    /**
     * @var ?array<string, mixed> $properties Event properties. Unrecognized keys outside these documented fields are ignored - keep row data inside properties.
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @param array{
     *   eventId: string,
     *   name: string,
     *   email?: ?string,
     *   externalId?: ?string,
     *   occurredAt?: ?DateTime,
     *   properties?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'] ?? null;
        $this->eventId = $values['eventId'];
        $this->externalId = $values['externalId'] ?? null;
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
