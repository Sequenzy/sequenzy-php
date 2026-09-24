<?php

namespace Sequenzy\Subscribers\Events\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Subscribers\Events\Types\TriggerEventsRequestAccountAttributes;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Union;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class TriggerEventsRequest extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |TriggerEventsRequestAccountAttributes
     * )|null $account Attach the contact to an account (your customer's organization, unrelated to your Sequenzy account). Pass the account's externalId as a string, or an object with externalId plus optional name, domain, role (owner, admin, member) and attributes. The account is created when missing and its context is added to the event as `event.account.*`. Only used once the workspace has Accounts on (it has at least one account, or Accounts was turned on in the dashboard). Before that, the field is ignored in any shape and the response includes `accountIgnored`.
     */
    #[JsonProperty('account'), Union('string', TriggerEventsRequestAccountAttributes::class, 'null')]
    public string|TriggerEventsRequestAccountAttributes|null $account;

    /**
     * @var ?array<string, mixed> $customAttributes Optional attributes to set on the subscriber if created
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var ?string $email Required when creating a new subscriber. Optional when externalId identifies an existing subscriber.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var string $event
     */
    #[JsonProperty('event')]
    public string $event;

    /**
     * @var ?string $eventId Caller-owned event ID used as an idempotency key on both paths. A repeated live event returns the existing event with duplicate=true. A repeated historical event remains a historical response and increments duplicates instead. Best-effort for live events sent within about a second of each other, so a producer needing a strict guarantee should keep its own ledger.
     */
    #[JsonProperty('eventId')]
    public ?string $eventId;

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
     * @var ?DateTime $occurredAt When the event actually happened. Defaults to now. More than an hour in the past records it as history - stored with the real timestamp and counted by segments, but running no sequences, sync rules, waiting steps, goal conversions or webhooks, and the response carries historical=true. Older than the 5-year event retention window is rejected with 400.
     */
    #[JsonProperty('occurredAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $occurredAt;

    /**
     * @var ?array<string, mixed> $properties Event properties/metadata
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @param array{
     *   event: string,
     *   account?: (
     *    string
     *   |TriggerEventsRequestAccountAttributes
     * )|null,
     *   customAttributes?: ?array<string, mixed>,
     *   email?: ?string,
     *   eventId?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   occurredAt?: ?DateTime,
     *   properties?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->account = $values['account'] ?? null;
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->event = $values['event'];
        $this->eventId = $values['eventId'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->occurredAt = $values['occurredAt'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }
}
