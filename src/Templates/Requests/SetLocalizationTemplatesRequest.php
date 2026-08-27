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
     *   previewText?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'];
    }
}
