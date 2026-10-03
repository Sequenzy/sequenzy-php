<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Statistical significance of the test's winner metric. The leading variant is compared with every other variant using a two-sided two-proportion z-test, Bonferroni-corrected for the number of comparisons. Rates are measured over delivered emails, or sends when no deliveries were recorded. Before a winner is selected it uses the same time range as the stats. Once a winner is selected, it compares only emails sent before the winner was chosen (with all of their later opens and clicks) and ignores period, start and end, because the winner's later sends are counted under its variant.
 */
class AbTestSignificance extends JsonSerializableType
{
    /**
     * @var ?float $confidence One minus the corrected p-value, from 0 to 1. Values at or above confidenceLevel mean the difference is unlikely to be chance. Very strong results can round to exactly 1. Null while data is insufficient.
     */
    #[JsonProperty('confidence')]
    public ?float $confidence;

    /**
     * @var float $confidenceLevel Confidence required for `significant`, from 0 to 1.
     */
    #[JsonProperty('confidenceLevel')]
    public float $confidenceLevel;

    /**
     * @var ?string $leaderVariantId Variant with the highest rate, or null when the top variants are tied.
     */
    #[JsonProperty('leaderVariantId')]
    public ?string $leaderVariantId;

    /**
     * @var ?string $leaderVariantLabel
     */
    #[JsonProperty('leaderVariantLabel')]
    public ?string $leaderVariantLabel;

    /**
     * @var value-of<AbTestSignificanceMetric> $metric Metric compared, taken from the test's winner criteria.
     */
    #[JsonProperty('metric')]
    public string $metric;

    /**
     * @var ?float $pValue Corrected two-sided p-value of the weakest leader comparison. Very strong results can round to exactly 0. Null while data is insufficient.
     */
    #[JsonProperty('pValue')]
    public ?float $pValue;

    /**
     * @var ?float $relativeLift Relative improvement of the leader over the closest variant (0.3 means 30% higher). Null without a leader or when the closest variant has no opens/clicks.
     */
    #[JsonProperty('relativeLift')]
    public ?float $relativeLift;

    /**
     * @var value-of<AbTestSignificanceStatus> $status `insufficient_data` means a variant has fewer than 30 recipients or too few opens/clicks (or non-conversions) for a reliable result. `significant` means confidence reached `confidenceLevel`.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   confidenceLevel: float,
     *   metric: value-of<AbTestSignificanceMetric>,
     *   status: value-of<AbTestSignificanceStatus>,
     *   confidence?: ?float,
     *   leaderVariantId?: ?string,
     *   leaderVariantLabel?: ?string,
     *   pValue?: ?float,
     *   relativeLift?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->confidence = $values['confidence'] ?? null;
        $this->confidenceLevel = $values['confidenceLevel'];
        $this->leaderVariantId = $values['leaderVariantId'] ?? null;
        $this->leaderVariantLabel = $values['leaderVariantLabel'] ?? null;
        $this->metric = $values['metric'];
        $this->pValue = $values['pValue'] ?? null;
        $this->relativeLift = $values['relativeLift'] ?? null;
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
