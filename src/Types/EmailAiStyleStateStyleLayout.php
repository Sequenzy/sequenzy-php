<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Structure guidance captured with the appearance. Absent on snapshots saved before layout habits existed.
 */
class EmailAiStyleStateStyleLayout extends JsonSerializableType
{
    /**
     * @var ?array<string> $outline Top-level block descriptors in source order (for example heading:1, divider:dots, button:pill), excluding logo and footer scaffolding.
     */
    #[JsonProperty('outline'), ArrayType(['string'])]
    public ?array $outline;

    /**
     * @var ?array<EmailAiStyleLayoutRule> $rules Confirmed layout habits. Generation follows them in prompts and inserts content-free companions (dividers, spacers) deterministically.
     */
    #[JsonProperty('rules'), ArrayType([EmailAiStyleLayoutRule::class])]
    public ?array $rules;

    /**
     * @param array{
     *   outline?: ?array<string>,
     *   rules?: ?array<EmailAiStyleLayoutRule>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->outline = $values['outline'] ?? null;
        $this->rules = $values['rules'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
