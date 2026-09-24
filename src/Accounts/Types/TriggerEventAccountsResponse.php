<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Account;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TriggerEventAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?Account $account
     */
    #[JsonProperty('account')]
    public ?Account $account;

    /**
     * @var ?array<TriggerEventAccountsResponseDeliveriesItem> $deliveries
     */
    #[JsonProperty('deliveries'), ArrayType([TriggerEventAccountsResponseDeliveriesItem::class])]
    public ?array $deliveries;

    /**
     * @var ?bool $duplicate True when a caller-supplied eventId had already been recorded; nothing new was written.
     */
    #[JsonProperty('duplicate')]
    public ?bool $duplicate;

    /**
     * @var ?TriggerEventAccountsResponseEvent $event
     */
    #[JsonProperty('event')]
    public ?TriggerEventAccountsResponseEvent $event;

    /**
     * @var ?int $recipientCount
     */
    #[JsonProperty('recipientCount')]
    public ?int $recipientCount;

    /**
     * @var ?value-of<TriggerEventAccountsResponseRecipients> $recipients
     */
    #[JsonProperty('recipients')]
    public ?string $recipients;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $truncated True when the account has more matching members than the 5,000 fan-out cap.
     */
    #[JsonProperty('truncated')]
    public ?bool $truncated;

    /**
     * @param array{
     *   account?: ?Account,
     *   deliveries?: ?array<TriggerEventAccountsResponseDeliveriesItem>,
     *   duplicate?: ?bool,
     *   event?: ?TriggerEventAccountsResponseEvent,
     *   recipientCount?: ?int,
     *   recipients?: ?value-of<TriggerEventAccountsResponseRecipients>,
     *   success?: ?bool,
     *   truncated?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->account = $values['account'] ?? null;
        $this->deliveries = $values['deliveries'] ?? null;
        $this->duplicate = $values['duplicate'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->recipientCount = $values['recipientCount'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->truncated = $values['truncated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
