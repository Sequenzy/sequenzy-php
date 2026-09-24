<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountReference;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\AccountMember;
use Sequenzy\Core\Types\ArrayType;

class ListMembersAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?AccountReference $account
     */
    #[JsonProperty('account')]
    public ?AccountReference $account;

    /**
     * @var ?array<AccountMember> $members
     */
    #[JsonProperty('members'), ArrayType([AccountMember::class])]
    public ?array $members;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   account?: ?AccountReference,
     *   members?: ?array<AccountMember>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->account = $values['account'] ?? null;
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
