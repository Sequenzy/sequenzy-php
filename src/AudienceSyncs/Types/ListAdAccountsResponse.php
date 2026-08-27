<?php

namespace Sequenzy\AudienceSyncs\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AdAccount;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListAdAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?array<AdAccount> $adAccounts
     */
    #[JsonProperty('adAccounts'), ArrayType([AdAccount::class])]
    public ?array $adAccounts;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   adAccounts?: ?array<AdAccount>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->adAccounts = $values['adAccounts'] ?? null;
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
