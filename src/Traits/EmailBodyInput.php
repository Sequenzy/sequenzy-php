<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property ?array<EmailBlock> $blocks
 * @property ?string $html
 */
trait EmailBodyInput
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
}
