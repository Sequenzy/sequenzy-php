<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceAbTestStepVariant extends JsonSerializableType
{
    /**
     * @var ?float $blockCount Number of blocks in this variant's body. Same as blocks.length.
     */
    #[JsonProperty('blockCount')]
    public ?float $blockCount;

    /**
     * @var ?array<EmailBlock> $blocks This variant's email body. Present when ab_tests:read is granted. Step-level blocks remain control variant A only.
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?string $emailId Email template holding this variant's stored copy.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?bool $isWinner
     */
    #[JsonProperty('isWinner')]
    public ?bool $isWinner;

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
     * @var ?string $variantId
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @var ?string $variantLabel
     */
    #[JsonProperty('variantLabel')]
    public ?string $variantLabel;

    /**
     * @param array{
     *   blockCount?: ?float,
     *   blocks?: ?array<EmailBlock>,
     *   emailId?: ?string,
     *   isWinner?: ?bool,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   variantId?: ?string,
     *   variantLabel?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockCount = $values['blockCount'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->isWinner = $values['isWinner'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->variantId = $values['variantId'] ?? null;
        $this->variantLabel = $values['variantLabel'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
