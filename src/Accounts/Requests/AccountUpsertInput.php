<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Accounts\Types\AccountUpsertInputMembersItem;

class AccountUpsertInput extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $attributes Up to 100 attributes. Null values delete keys when merging.
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $attributes;

    /**
     * @var ?string $domain Normalized to a hostname such as acme.com.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var string $externalId
     */
    #[JsonProperty('externalId')]
    public string $externalId;

    /**
     * @var ?array<AccountUpsertInputMembersItem> $members
     */
    #[JsonProperty('members'), ArrayType([AccountUpsertInputMembersItem::class])]
    public ?array $members;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $replaceAttributes
     */
    #[JsonProperty('replaceAttributes')]
    public ?bool $replaceAttributes;

    /**
     * @param array{
     *   externalId: string,
     *   attributes?: ?array<string, mixed>,
     *   domain?: ?string,
     *   members?: ?array<AccountUpsertInputMembersItem>,
     *   name?: ?string,
     *   replaceAttributes?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributes = $values['attributes'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->externalId = $values['externalId'];
        $this->members = $values['members'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->replaceAttributes = $values['replaceAttributes'] ?? null;
    }
}
