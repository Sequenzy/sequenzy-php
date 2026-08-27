<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceAbTestStepVariant extends JsonSerializableType
{
    /**
     * @var ?float $blockCount Number of blocks in this variant's body. Read the blocks themselves with GET /ab-tests/{abTestId}.
     */
    #[JsonProperty('blockCount')]
    public ?float $blockCount;

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
