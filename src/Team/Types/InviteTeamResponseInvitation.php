<?php

namespace Sequenzy\Team\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class InviteTeamResponseInvitation extends JsonSerializableType
{
    /**
     * @var ?bool $canManageBilling
     */
    #[JsonProperty('canManageBilling')]
    public ?bool $canManageBilling;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $invitedAt
     */
    #[JsonProperty('invitedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $invitedAt;

    /**
     * @var ?value-of<InviteTeamResponseInvitationRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   canManageBilling?: ?bool,
     *   email?: ?string,
     *   expiresAt?: ?DateTime,
     *   id?: ?string,
     *   invitedAt?: ?DateTime,
     *   role?: ?value-of<InviteTeamResponseInvitationRole>,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->canManageBilling = $values['canManageBilling'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->invitedAt = $values['invitedAt'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
