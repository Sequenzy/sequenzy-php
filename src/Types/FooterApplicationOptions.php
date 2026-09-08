<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class FooterApplicationOptions extends JsonSerializableType
{
    /**
     * @var ?bool $includeCustomized
     */
    #[JsonProperty('includeCustomized')]
    public ?bool $includeCustomized;

    /**
     * @var array<value-of<FooterApplicationOptionsScopesItem>> $scopes
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public array $scopes;

    /**
     * @param array{
     *   scopes: array<value-of<FooterApplicationOptionsScopesItem>>,
     *   includeCustomized?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->includeCustomized = $values['includeCustomized'] ?? null;
        $this->scopes = $values['scopes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
