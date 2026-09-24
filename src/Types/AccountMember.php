<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class AccountMember extends JsonSerializableType
{
    /**
     * @var ?string $accountId
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

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
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?value-of<AccountMemberRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @param array{
     *   accountId?: ?string,
     *   createdAt?: ?DateTime,
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   id?: ?string,
     *   lastName?: ?string,
     *   role?: ?value-of<AccountMemberRole>,
     *   status?: ?string,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountId = $values['accountId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->status = $values['status'] ?? null;
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
