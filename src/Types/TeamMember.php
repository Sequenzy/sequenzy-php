<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class TeamMember extends JsonSerializableType
{
    /**
     * @var ?bool $canManageBilling
     */
    #[JsonProperty('canManageBilling')]
    public ?bool $canManageBilling;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?string $id Member or invitation ID. The owner entry uses the literal id "owner".
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $invitedAt
     */
    #[JsonProperty('invitedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $invitedAt;

    /**
     * @var ?TeamMemberInvitedBy $invitedBy
     */
    #[JsonProperty('invitedBy')]
    public ?TeamMemberInvitedBy $invitedBy;

    /**
     * @var ?value-of<TeamMemberKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?value-of<TeamMemberRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?value-of<TeamMemberStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?TeamMemberUser $user
     */
    #[JsonProperty('user')]
    public ?TeamMemberUser $user;

    /**
     * @var ?string $userId
     */
    #[JsonProperty('userId')]
    public ?string $userId;

    /**
     * @param array{
     *   canManageBilling?: ?bool,
     *   createdAt?: ?DateTime,
     *   expiresAt?: ?DateTime,
     *   id?: ?string,
     *   invitedAt?: ?DateTime,
     *   invitedBy?: ?TeamMemberInvitedBy,
     *   kind?: ?value-of<TeamMemberKind>,
     *   role?: ?value-of<TeamMemberRole>,
     *   status?: ?value-of<TeamMemberStatus>,
     *   user?: ?TeamMemberUser,
     *   userId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->canManageBilling = $values['canManageBilling'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->invitedAt = $values['invitedAt'] ?? null;
        $this->invitedBy = $values['invitedBy'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->user = $values['user'] ?? null;
        $this->userId = $values['userId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
