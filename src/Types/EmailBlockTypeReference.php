<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Field reference for one email block type. Lists are their own block type rather than a text variant: a `text` block accepts only variant paragraph, lead, or html and never accepts `items`.
 */
class EmailBlockTypeReference extends JsonSerializableType
{
    /**
     * @var ?bool $creatable False for structural types the editor manages, which should not be hand-authored.
     */
    #[JsonProperty('creatable')]
    public ?bool $creatable;

    /**
     * @var ?array<string, mixed> $example A minimal valid block of this type.
     */
    #[JsonProperty('example'), ArrayType(['string' => 'mixed'])]
    public ?array $example;

    /**
     * @var ?array<EmailBlockFieldReference> $fields
     */
    #[JsonProperty('fields'), ArrayType([EmailBlockFieldReference::class])]
    public ?array $fields;

    /**
     * @var ?array<string> $notes
     */
    #[JsonProperty('notes'), ArrayType(['string'])]
    public ?array $notes;

    /**
     * @var ?array<string> $optional
     */
    #[JsonProperty('optional'), ArrayType(['string'])]
    public ?array $optional;

    /**
     * @var ?string $reason Why a non-creatable type is excluded.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?array<string> $required
     */
    #[JsonProperty('required'), ArrayType(['string'])]
    public ?array $required;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   creatable?: ?bool,
     *   example?: ?array<string, mixed>,
     *   fields?: ?array<EmailBlockFieldReference>,
     *   notes?: ?array<string>,
     *   optional?: ?array<string>,
     *   reason?: ?string,
     *   required?: ?array<string>,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->creatable = $values['creatable'] ?? null;
        $this->example = $values['example'] ?? null;
        $this->fields = $values['fields'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->optional = $values['optional'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->required = $values['required'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
