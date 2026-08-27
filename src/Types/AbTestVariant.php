<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class AbTestVariant extends JsonSerializableType
{
    /**
     * @var ?string $abTestId
     */
    #[JsonProperty('abTestId')]
    public ?string $abTestId;

    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isWinner
     */
    #[JsonProperty('isWinner')]
    public ?bool $isWinner;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?array<array<string, mixed>> $localizations
     */
    #[JsonProperty('localizations'), ArrayType([['string' => 'mixed']])]
    public ?array $localizations;

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
     * @var ?int $testClicks
     */
    #[JsonProperty('testClicks')]
    public ?int $testClicks;

    /**
     * @var ?int $testOpens
     */
    #[JsonProperty('testOpens')]
    public ?int $testOpens;

    /**
     * @var ?int $testSends
     */
    #[JsonProperty('testSends')]
    public ?int $testSends;

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
     *   abTestId?: ?string,
     *   blocks?: ?array<EmailBlock>,
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   id?: ?string,
     *   isWinner?: ?bool,
     *   label?: ?string,
     *   localizations?: ?array<array<string, mixed>>,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   testClicks?: ?int,
     *   testOpens?: ?int,
     *   testSends?: ?int,
     *   variantId?: ?string,
     *   variantLabel?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTestId = $values['abTestId'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isWinner = $values['isWinner'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->localizations = $values['localizations'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->testClicks = $values['testClicks'] ?? null;
        $this->testOpens = $values['testOpens'] ?? null;
        $this->testSends = $values['testSends'] ?? null;
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
