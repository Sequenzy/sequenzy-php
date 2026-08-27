<?php

namespace Sequenzy\AbTests\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateAbTestsRequestVariantsItem extends JsonSerializableType
{
    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

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
     *   subject: string,
     *   blocks?: ?array<EmailBlock>,
     *   previewText?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
