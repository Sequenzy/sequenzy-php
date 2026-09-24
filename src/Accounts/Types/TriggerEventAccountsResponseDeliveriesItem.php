<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TriggerEventAccountsResponseDeliveriesItem extends JsonSerializableType
{
    /**
     * @var ?array<string> $automationsTriggered
     */
    #[JsonProperty('automationsTriggered'), ArrayType(['string'])]
    public ?array $automationsTriggered;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?value-of<TriggerEventAccountsResponseDeliveriesItemRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?value-of<TriggerEventAccountsResponseDeliveriesItemSkipped> $skipped Present when the recipient was deleted after the event was recorded. The delivery counts as finished and retries do not attempt it again.
     */
    #[JsonProperty('skipped')]
    public ?string $skipped;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   automationsTriggered?: ?array<string>,
     *   email?: ?string,
     *   error?: ?string,
     *   role?: ?value-of<TriggerEventAccountsResponseDeliveriesItemRole>,
     *   skipped?: ?value-of<TriggerEventAccountsResponseDeliveriesItemSkipped>,
     *   subscriberId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automationsTriggered = $values['automationsTriggered'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
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
