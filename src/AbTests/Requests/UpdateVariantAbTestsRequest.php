<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailBodyInput;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailBlock;

class UpdateVariantAbTestsRequest extends JsonSerializableType
{
    use EmailBodyInput;

    /**
     * @var ?bool $confirmLiveChange Required as true when the sequence is active, the test is no longer a draft, or the test has recorded activity. Earlier sends remain unchanged, so combined results may no longer be accurate.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

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
     *   confirmLiveChange?: ?bool,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   blocks?: ?array<EmailBlock>,
     *   html?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
    }
}
