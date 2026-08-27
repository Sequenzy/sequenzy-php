<?php

namespace Sequenzy\Transactional\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailBodyInput;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailBlock;

class CreateTransactionalRequest extends JsonSerializableType
{
    use EmailBodyInput;

    /**
     * @var ?bool $enabled Defaults to false with prompt and true with explicit HTML or blocks.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

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
     * @var ?string $prompt Natural-language request for branded transactional blocks.
     */
    #[JsonProperty('prompt')]
    public ?string $prompt;

    /**
     * @var ?string $slug Optional API slug used when sending by slug. If omitted, one is generated from the name.
     */
    #[JsonProperty('slug')]
    public ?string $slug;

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
     *   enabled?: ?bool,
     *   previewText?: ?string,
     *   prompt?: ?string,
     *   slug?: ?string,
     *   style?: ?string,
     *   subject?: ?string,
     *   tone?: ?string,
     *   blocks?: ?array<EmailBlock>,
     *   html?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->name = $values['name'];
        $this->previewText = $values['previewText'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->style = $values['style'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->tone = $values['tone'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
    }
}
