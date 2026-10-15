<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EmailVariationResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?EmailVariation $variation
     */
    #[JsonProperty('variation')]
    public ?EmailVariation $variation;

    /**
     * @var ?array<string> $warnings Block fields that were accepted but had no effect.
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   success?: ?bool,
     *   variation?: ?EmailVariation,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->variation = $values['variation'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
