<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AccountUpsertResponse extends JsonSerializableType
{
    /**
     * @var ?Account $account
     */
    #[JsonProperty('account')]
    public ?Account $account;

    /**
     * @var ?bool $created
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?array<AccountUpsertResponseMembersItem> $members
     */
    #[JsonProperty('members'), ArrayType([AccountUpsertResponseMembersItem::class])]
    public ?array $members;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   account?: ?Account,
     *   created?: ?bool,
     *   members?: ?array<AccountUpsertResponseMembersItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->account = $values['account'] ?? null;
        $this->created = $values['created'] ?? null;
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
