<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EmailSectionOption extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<EmailBlock> $replacements New versions of the selected blocks, keeping their ids.
     */
    #[JsonProperty('replacements'), ArrayType([EmailBlock::class])]
    public ?array $replacements;

    /**
     * @var ?string $summary
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @param array{
     *   name?: ?string,
     *   replacements?: ?array<EmailBlock>,
     *   summary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->replacements = $values['replacements'] ?? null;
        $this->summary = $values['summary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
