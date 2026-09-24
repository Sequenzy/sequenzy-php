<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Account;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\AccountMember;
use Sequenzy\Core\Types\ArrayType;

class GetByExternalIdAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?Account $account
     */
    #[JsonProperty('account')]
    public ?Account $account;

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
     *   account?: ?Account,
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
