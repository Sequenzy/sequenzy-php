<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountMemberChangeResponse extends JsonSerializableType
{
    /**
     * @var ?Account $account
     */
    #[JsonProperty('account')]
    public ?Account $account;

    /**
     * @var ?AccountMemberChangeResponseMember $member
     */
    #[JsonProperty('member')]
    public ?AccountMemberChangeResponseMember $member;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   account?: ?Account,
     *   member?: ?AccountMemberChangeResponseMember,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->account = $values['account'] ?? null;
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
