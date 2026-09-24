<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListSuggestionsAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Number of suggestions. Values outside 1-100 are clamped; non-numeric values use the default.
     */
    public ?int $limit;

    /**
     * @var ?int $minContacts Contacts a domain needs to be suggested. Values outside 2-1000 are clamped; non-numeric values use the default.
     */
    public ?int $minContacts;

    /**
     * @param array{
     *   limit?: ?int,
     *   minContacts?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->minContacts = $values['minContacts'] ?? null;
    }
}
