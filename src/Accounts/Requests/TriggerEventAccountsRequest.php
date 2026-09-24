<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Accounts\Types\TriggerEventAccountsRequestRecipients;

class TriggerEventAccountsRequest extends JsonSerializableType
{
    /**
     * @var string $event
     */
    #[JsonProperty('event')]
    public string $event;

    /**
     * @var ?string $eventId Idempotency key scoped to this account, including when accounts share members. Retries keep the original recipients, properties and event time and resume incomplete deliveries.
     */
    #[JsonProperty('eventId')]
    public ?string $eventId;

    /**
     * @var ?DateTime $occurredAt
     */
    #[JsonProperty('occurredAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $occurredAt;

    /**
     * @var ?array<string, mixed> $properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @var ?value-of<TriggerEventAccountsRequestRecipients> $recipients
     */
    #[JsonProperty('recipients')]
    public ?string $recipients;

    /**
     * @param array{
     *   event: string,
     *   eventId?: ?string,
     *   occurredAt?: ?DateTime,
     *   properties?: ?array<string, mixed>,
     *   recipients?: ?value-of<TriggerEventAccountsRequestRecipients>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->event = $values['event'];
        $this->eventId = $values['eventId'] ?? null;
        $this->occurredAt = $values['occurredAt'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
    }
}
