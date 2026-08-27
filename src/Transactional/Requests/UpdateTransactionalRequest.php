<?php

namespace Sequenzy\Transactional\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailBodyInput;
use Sequenzy\Core\Json\JsonProperty;
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
        $this->name = $values['name'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
    }
}
