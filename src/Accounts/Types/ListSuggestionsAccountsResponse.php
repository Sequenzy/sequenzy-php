<?php

namespace Sequenzy\Accounts\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\AccountSuggestion;
use Sequenzy\Core\Types\ArrayType;

class ListSuggestionsAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<AccountSuggestion> $suggestions
     */
    #[JsonProperty('suggestions'), ArrayType([AccountSuggestion::class])]
    public ?array $suggestions;

    /**
     * @param array{
     *   success?: ?bool,
     *   suggestions?: ?array<AccountSuggestion>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->suggestions = $values['suggestions'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
