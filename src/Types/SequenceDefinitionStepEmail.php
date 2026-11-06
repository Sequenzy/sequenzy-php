<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Email steps only. Required for a new email step, with a subject or a template; omit to keep the stored content.
 */
class SequenceDefinitionStepEmail extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Email blocks. GET always returns blocks.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?string $html Shortcut for a single HTML block. Use either blocks or html.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $template ID of an email in your company. Supplies the subject, preview text, content and style for any of those the step does not write. The step keeps its own copy, refreshed from the template on every push.
     */
    #[JsonProperty('template')]
    public ?string $template;

    /**
     * @param array{
     *   blocks?: ?array<array<string, mixed>>,
     *   html?: ?string,
     *   name?: ?string,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   template?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->template = $values['template'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
