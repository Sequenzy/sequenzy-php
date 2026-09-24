<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Accounts\Types\AddMemberAccountsRequestRole;

class AddMemberAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId Contact external ID, as an alternative to email.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?value-of<AddMemberAccountsRequestRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @param array{
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   role?: ?value-of<AddMemberAccountsRequestRole>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->role = $values['role'] ?? null;
    }
}
