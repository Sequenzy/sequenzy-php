<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AccountPatchInput extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $attributes
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $attributes;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

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
     *   attributes?: ?array<string, mixed>,
     *   domain?: ?string,
     *   name?: ?string,
     *   replaceAttributes?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attributes = $values['attributes'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->replaceAttributes = $values['replaceAttributes'] ?? null;
    }
}
