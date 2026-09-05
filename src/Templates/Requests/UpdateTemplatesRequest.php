<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Replacement Sequenzy email blocks. Mutually exclusive with html. Put visual styling under styles; top-level style keys such as backgroundColor, backgroundOpacity, borderColor, borderWidth, and borderRadius are normalized into styles.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?string $html Replacement HTML body. Mutually exclusive with blocks.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?bool $isTemplate Mark (true) or unmark (false) this email as a reusable master design.
     */
    #[JsonProperty('isTemplate')]
    public ?bool $isTemplate;

    /**
     * @var ?array<string> $label Compatibility alias for labels.
     */
    #[JsonProperty('label'), ArrayType(['string'])]
    public ?array $label;

    /**
     * @var ?array<string> $labels Replacement label names. Send an empty array to clear labels. Missing labels are created automatically.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewText Inbox preview text. Send null to clear it.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var mixed $updates Unsupported nested update object. Requests using it return a validation error.
     */
    #[JsonProperty('updates')]
    public mixed $updates;

    /**
     * @param array{
     *   blocks?: ?array<array<string, mixed>>,
     *   html?: ?string,
     *   isTemplate?: ?bool,
     *   label?: ?array<string>,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   updates?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->isTemplate = $values['isTemplate'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->updates = $values['updates'] ?? null;
    }
}
