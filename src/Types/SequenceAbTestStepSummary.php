<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * A/B test attached to an action_ab_test step. The step's own subject, previewText, and blocks are control variant A only. Without ab_tests:read, record-backed fields are null and variants is empty while the configured id and editing guidance remain available.
 */
class SequenceAbTestStepSummary extends JsonSerializableType
{
    /**
     * @var ?AbTestContentEditing $contentEditing
     */
    #[JsonProperty('contentEditing')]
    public ?AbTestContentEditing $contentEditing;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?value-of<SequenceAbTestStepSummaryTestType> $testType
     */
    #[JsonProperty('testType')]
    public ?string $testType;

    /**
     * @var ?float $variantCount
     */
    #[JsonProperty('variantCount')]
    public ?float $variantCount;

    /**
     * @var ?array<SequenceAbTestStepVariant> $variants
     */
    #[JsonProperty('variants'), ArrayType([SequenceAbTestStepVariant::class])]
    public ?array $variants;

    /**
     * @var ?string $winnerCriteria
     */
    #[JsonProperty('winnerCriteria')]
    public ?string $winnerCriteria;

    /**
     * @var ?float $winnerThreshold
     */
    #[JsonProperty('winnerThreshold')]
    public ?float $winnerThreshold;

    /**
     * @var ?string $winningVariantId
     */
    #[JsonProperty('winningVariantId')]
    public ?string $winningVariantId;

    /**
     * @param array{
     *   contentEditing?: ?AbTestContentEditing,
     *   id?: ?string,
     *   name?: ?string,
     *   status?: ?string,
     *   testType?: ?value-of<SequenceAbTestStepSummaryTestType>,
     *   variantCount?: ?float,
     *   variants?: ?array<SequenceAbTestStepVariant>,
     *   winnerCriteria?: ?string,
     *   winnerThreshold?: ?float,
     *   winningVariantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentEditing = $values['contentEditing'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->testType = $values['testType'] ?? null;
        $this->variantCount = $values['variantCount'] ?? null;
        $this->variants = $values['variants'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'] ?? null;
        $this->winnerThreshold = $values['winnerThreshold'] ?? null;
        $this->winningVariantId = $values['winningVariantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
