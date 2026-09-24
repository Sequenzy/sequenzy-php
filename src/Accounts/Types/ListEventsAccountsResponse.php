<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountReference;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\AccountEvent;
use Sequenzy\Core\Types\ArrayType;

class ListEventsAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?AccountReference $account
     */
    #[JsonProperty('account')]
    public ?AccountReference $account;

    /**
     * @var ?array<AccountEvent> $events
     */
    #[JsonProperty('events'), ArrayType([AccountEvent::class])]
    public ?array $events;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   account?: ?AccountReference,
     *   events?: ?array<AccountEvent>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->account = $values['account'] ?? null;
        $this->events = $values['events'] ?? null;
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
