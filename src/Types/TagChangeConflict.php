<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TagChangeConflict extends JsonSerializableType
{
    /**
     * @var ?value-of<TagChangeConflictCode> $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<TagChangeConflictUsageItem> $usage Where the tag is still used. Present for tag_in_use.
     */
    #[JsonProperty('usage'), ArrayType([TagChangeConflictUsageItem::class])]
    public ?array $usage;

    /**
     * @param array{
     *   code?: ?value-of<TagChangeConflictCode>,
     *   error?: ?string,
     *   success?: ?bool,
     *   usage?: ?array<TagChangeConflictUsageItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->code = $values['code'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->usage = $values['usage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
