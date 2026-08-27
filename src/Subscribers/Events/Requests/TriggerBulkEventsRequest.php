<?php

namespace Sequenzy\Subscribers\Events\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Subscribers\Events\Types\TriggerBulkEventsRequestEventsItem;

class TriggerBulkEventsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var ?string $email Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var array<TriggerBulkEventsRequestEventsItem> $events
     */
    #[JsonProperty('events'), ArrayType([TriggerBulkEventsRequestEventsItem::class])]
    public array $events;

    /**
     * @var ?string $externalId Customer-owned app/customer/user ID
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName First name to set if creating the subscriber.
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName Last name to set if creating the subscriber.
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @param array{
     *   events: array<TriggerBulkEventsRequestEventsItem>,
     *   customAttributes?: ?array<string, mixed>,
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->events = $values['events'];
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
    }
}
