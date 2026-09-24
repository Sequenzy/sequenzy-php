<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AcceptSuggestionsAccountsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $domains Domains to accept, such as `acme.com`. Normalized to lowercase; duplicates are ignored. Personal and disposable providers are rejected.
     */
    #[JsonProperty('domains'), ArrayType(['string'])]
    public array $domains;

    /**
     * @param array{
     *   domains: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domains = $values['domains'];
    }
}
