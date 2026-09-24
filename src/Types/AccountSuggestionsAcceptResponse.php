<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AccountSuggestionsAcceptResponse extends JsonSerializableType
{
    /**
     * @var ?int $accountsCreated
     */
    #[JsonProperty('accountsCreated')]
    public ?int $accountsCreated;

    /**
     * @var ?int $membershipsCreated
     */
    #[JsonProperty('membershipsCreated')]
    public ?int $membershipsCreated;

    /**
     * @var ?array<AccountSuggestionsAcceptResponseResultsItem> $results
     */
    #[JsonProperty('results'), ArrayType([AccountSuggestionsAcceptResponseResultsItem::class])]
    public ?array $results;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   accountsCreated?: ?int,
     *   membershipsCreated?: ?int,
     *   results?: ?array<AccountSuggestionsAcceptResponseResultsItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountsCreated = $values['accountsCreated'] ?? null;
        $this->membershipsCreated = $values['membershipsCreated'] ?? null;
        $this->results = $values['results'] ?? null;
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
