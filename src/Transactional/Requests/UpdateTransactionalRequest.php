<?php

namespace Sequenzy\Transactional\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailBodyInput;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\EmailBlock;

class UpdateTransactionalRequest extends JsonSerializableType
{
    use EmailBodyInput;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?array<string> $labels Company label names. Trimmed and deduplicated; missing names are created. Replaces all assignments; [] clears them. Omit to preserve assignments on update or start without labels on create. Null and blank names are rejected.
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

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
     * @param array{
     *   enabled?: ?bool,
     *   labels?: ?array<string>,
     *   name?: ?string,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   blocks?: ?array<EmailBlock>,
     *   html?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
    }
}
