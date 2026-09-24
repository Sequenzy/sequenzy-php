<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountUpsertResponseMembersItem extends JsonSerializableType
{
    /**
     * @var ?bool $created
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @param array{
     *   created?: ?bool,
     *   email?: ?string,
     *   externalId?: ?string,
     *   role?: ?string,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
