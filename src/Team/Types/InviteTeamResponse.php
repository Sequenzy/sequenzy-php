<?php

namespace Sequenzy\Team\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\TeamMember;

class InviteTeamResponse extends JsonSerializableType
{
    /**
     * @var ?InviteTeamResponseInvitation $invitation
     */
    #[JsonProperty('invitation')]
    public ?InviteTeamResponseInvitation $invitation;

    /**
     * @var ?TeamMember $member
     */
    #[JsonProperty('member')]
    public ?TeamMember $member;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   invitation?: ?InviteTeamResponseInvitation,
     *   member?: ?TeamMember,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->invitation = $values['invitation'] ?? null;
        $this->member = $values['member'] ?? null;
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
