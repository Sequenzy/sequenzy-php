<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SetLocalizationTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks Localized Sequenzy email blocks. Provide exactly one of blocks or html.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?string $html Localized raw HTML. Provide exactly one of html or blocks.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?bool $keepEdits Protect this translation like a dashboard edit. It is marked as edited (editedAt), automatic translation on save keeps it, and it becomes stale instead of being replaced when the original changes. Without it, the stored content is retranslated on the next save when automatic translation is on, and any earlier edit flag is cleared.
     */
    #[JsonProperty('keepEdits')]
    public ?bool $keepEdits;

    /**
     * @var ?string $previewText Optional localized inbox preview text.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var string $subject Localized email subject line.
     */
    #[JsonProperty('subject')]
    public string $subject;

    /**
     * @param array{
     *   subject: string,
     *   blocks?: ?array<EmailBlock>,
     *   html?: ?string,
     *   keepEdits?: ?bool,
     *   previewText?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->keepEdits = $values['keepEdits'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'];
    }
}
