<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AddVariantAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks Variant body blocks. Defaults to the campaign or sequence control email blocks.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?bool $confirmLiveChange Required as true when the A/B test belongs to an active sequence, because new variants immediately enter the live rotation.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

    /**
     * @var ?string $previewText Variant preview text.
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var string $subject Variant subject line.
     */
    #[JsonProperty('subject')]
    public string $subject;

    /**
     * @param array{
     *   subject: string,
     *   blocks?: ?array<EmailBlock>,
     *   confirmLiveChange?: ?bool,
     *   previewText?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'];
    }
}
