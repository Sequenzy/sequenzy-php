<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlockTypeReference;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\EmailBlockConditionFieldReference;

class ListEmailBlocksResponse extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlockTypeReference> $blockTypes
     */
    #[JsonProperty('blockTypes'), ArrayType([EmailBlockTypeReference::class])]
    public ?array $blockTypes;

    /**
     * @var ?array<EmailBlockConditionFieldReference> $conditionFields The per-field table for block conditions, always returned with the list. This is the call made to find out what exists, and the table adds about 9% to it.
     */
    #[JsonProperty('conditionFields'), ArrayType([EmailBlockConditionFieldReference::class])]
    public ?array $conditionFields;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   blockTypes?: ?array<EmailBlockTypeReference>,
     *   conditionFields?: ?array<EmailBlockConditionFieldReference>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockTypes = $values['blockTypes'] ?? null;
        $this->conditionFields = $values['conditionFields'] ?? null;
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
