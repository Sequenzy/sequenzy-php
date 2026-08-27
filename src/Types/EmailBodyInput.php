<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EmailBodyInput extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks Structured email blocks. Provide either blocks or html, not both. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?string $html Raw HTML body. Provide either html or blocks, not both.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @param array{
     *   blocks?: ?array<EmailBlock>,
     *   html?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
