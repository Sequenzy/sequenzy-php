<?php

namespace Sequenzy\Team\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Team\Types\InviteTeamRequestRole;

class InviteTeamRequest extends JsonSerializableType
{
    /**
     * @var ?bool $canManageBilling Whether the member can manage billing. Only the company owner can grant this.
     */
    #[JsonProperty('canManageBilling')]
    public ?bool $canManageBilling;

    /**
     * @var string $email Email address to invite.
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var value-of<InviteTeamRequestRole> $role Role for the new member. Marketers create, edit, and send campaigns and sequences and manage subscribers but cannot access transactional emails, settings, billing, or the team. Restricted members can open direct campaign links only.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @param array{
     *   email: string,
     *   role: value-of<InviteTeamRequestRole>,
     *   canManageBilling?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->canManageBilling = $values['canManageBilling'] ?? null;
        $this->email = $values['email'];
        $this->role = $values['role'];
    }
}
