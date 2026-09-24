<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Account;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Account> $accounts
     */
    #[JsonProperty('accounts'), ArrayType([Account::class])]
    public ?array $accounts;

    /**
     * @var ?bool $hasMore
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   accounts?: ?array<Account>,
     *   hasMore?: ?bool,
     *   limit?: ?int,
     *   page?: ?int,
     *   success?: ?bool,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accounts = $values['accounts'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
