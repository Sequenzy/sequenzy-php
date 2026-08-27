<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EmailBlockFieldReference extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlockFieldReference> $fields Shape of an object field, for example the `mode`, `strategy`, `lookbackDays`, `sort`, and `filters` of a repeat block's `productSource`.
     */
    #[JsonProperty('fields'), ArrayType([EmailBlockFieldReference::class])]
    public ?array $fields;

    /**
     * @var ?array<EmailBlockFieldReference> $itemFields Shape of one entry in an array field. This is where `list` and `steps` differ: list items carry `content`, steps items carry `title` and an optional `description`.
     */
    #[JsonProperty('itemFields'), ArrayType([EmailBlockFieldReference::class])]
    public ?array $itemFields;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $required
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @var ?string $type Value shape, for example string, number, boolean, enum, array, or object.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<mixed> $values Allowed values, for enum and literal-union fields.
     */
    #[JsonProperty('values'), ArrayType(['mixed'])]
    public ?array $values;

    /**
     * @param array{
     *   fields?: ?array<EmailBlockFieldReference>,
     *   itemFields?: ?array<EmailBlockFieldReference>,
     *   name?: ?string,
     *   required?: ?bool,
     *   type?: ?string,
     *   values?: ?array<mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->itemFields = $values['itemFields'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->required = $values['required'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->values = $values['values'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
