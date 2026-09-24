<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when `account` attached the contact to an account.
 */
class TriggerEventsResponseAccount extends JsonSerializableType
{
    /**
     * @var ?bool $created Whether this request created the account.
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?value-of<TriggerEventsResponseAccountRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @param array{
     *   created?: ?bool,
     *   externalId?: ?string,
     *   role?: ?value-of<TriggerEventsResponseAccountRole>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->role = $values['role'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
