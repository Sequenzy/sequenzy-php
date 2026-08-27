<?php

namespace Sequenzy\EmailBlocks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlockTypeReference;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailBlockConditionFieldReference;
use Sequenzy\Core\Types\ArrayType;

class GetEmailBlocksResponse extends JsonSerializableType
{
    /**
     * @var ?EmailBlockTypeReference $blockType
     */
    #[JsonProperty('blockType')]
    public ?EmailBlockTypeReference $blockType;

    /**
     * @var ?array<EmailBlockConditionFieldReference> $conditionFields The per-field table for block conditions. Returned when `type` is `conditional-group`, or when `conditionFields=true` is passed.
     */
    #[JsonProperty('conditionFields'), ArrayType([EmailBlockConditionFieldReference::class])]
    public ?array $conditionFields;

    /**
     * @var ?string $conditionFieldsHint Returned in place of `conditionFields` when the table was not included, saying that conditions are per-field and how to request the table.
     */
    #[JsonProperty('conditionFieldsHint')]
    public ?string $conditionFieldsHint;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   blockType?: ?EmailBlockTypeReference,
     *   conditionFields?: ?array<EmailBlockConditionFieldReference>,
     *   conditionFieldsHint?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockType = $values['blockType'] ?? null;
        $this->conditionFields = $values['conditionFields'] ?? null;
        $this->conditionFieldsHint = $values['conditionFieldsHint'] ?? null;
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
