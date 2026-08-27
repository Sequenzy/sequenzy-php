<?php

namespace Sequenzy\Team\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\TeamMember;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListTeamResponse extends JsonSerializableType
{
    /**
     * @var ?array<TeamMember> $members
     */
    #[JsonProperty('members'), ArrayType([TeamMember::class])]
    public ?array $members;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   members?: ?array<TeamMember>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->members = $values['members'] ?? null;
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
