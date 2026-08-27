<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Sequenzy email blocks. Mutually exclusive with html. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?string $html Raw HTML body. Mutually exclusive with blocks.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?array<string> $label Compatibility alias for labels.
     */
    #[JsonProperty('label'), ArrayType(['string'])]
    public ?array $label;

    /**
     * @var ?array<string> $labels Label names to assign. Missing labels are created automatically.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $prompt Natural-language request for branded native template blocks.
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?string $style Generation style; valid only with prompt.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?string $subject Required with HTML or blocks; optional with prompt, where it overrides the generated subject.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $tone Generation tone; valid only with prompt.
     */
    #[JsonProperty('tone')]
    public ?string $tone;

    /**
     * @param array{
     *   name: string,
     *   blocks?: ?array<array<string, mixed>>,
     *   html?: ?string,
     *   label?: ?array<string>,
     *   labels?: ?array<string>,
     *   previewText?: ?string,
     *   prompt?: ?string,
     *   style?: ?string,
     *   subject?: ?string,
     *   tone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'];
        $this->previewText = $values['previewText'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->style = $values['style'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->tone = $values['tone'] ?? null;
    }
}
