<?php

namespace Sequenzy\Emails\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailBodyInput;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailBlock;

class CreateEmailsRequest extends JsonSerializableType
{
    use EmailBodyInput;

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
     * @var string $subject
     */
    #[JsonProperty('subject')]
    public string $subject;

    /**
     * @param array{
     *   name: string,
     *   subject: string,
     *   previewText?: ?string,
     *   blocks?: ?array<EmailBlock>,
     *   html?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'];
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
    }
}
