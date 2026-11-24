<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class GetTransactionalConditionalBlockStatsResponse extends JsonSerializableType
{
    /**
     * @var ?string $abTestVariantId
     */
    #[JsonProperty('abTestVariantId')]
    public ?string $abTestVariantId;

    /**
     * @var ?array<array<string, mixed>> $alerts Automatic rule-health warnings (never_matched, empty_state_spike, lopsided_else, fail_closed_spike).
     */
    #[JsonProperty('alerts'), ArrayType([['string' => 'mixed']])]
    public ?array $alerts;

    /**
     * @var ?array<string, mixed> $baseline Email-wide averages over recorded sends (sends, deliveries, openRate, clickRate, conversionRate, unsubscribeRate, bounceRate). Null when no send recorded conditional decisions.
     */
    #[JsonProperty('baseline'), ArrayType(['string' => 'mixed'])]
    public ?array $baseline;

    /**
     * @var ?array<array<string, mixed>> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?array<array<string, mixed>> $conditionGroups Sibling conditional blocks with identical rules collapsed into one group. Branches carry rate deltas against the baseline and topClickedLink.
     */
    #[JsonProperty('conditionGroups'), ArrayType([['string' => 'mixed']])]
    public ?array $conditionGroups;

    /**
     * @var ?int $failClosedSends
     */
    #[JsonProperty('failClosedSends')]
    public ?int $failClosedSends;

    /**
     * @var ?string $goalId
     */
    #[JsonProperty('goalId')]
    public ?string $goalId;

    /**
     * @var ?int $recordedSends
     */
    #[JsonProperty('recordedSends')]
    public ?int $recordedSends;

    /**
     * @var ?string $sourceId
     */
    #[JsonProperty('sourceId')]
    public ?string $sourceId;

    /**
     * @var ?string $sourceName
     */
    #[JsonProperty('sourceName')]
    public ?string $sourceName;

    /**
     * @var ?value-of<GetTransactionalConditionalBlockStatsResponseSourceType> $sourceType
     */
    #[JsonProperty('sourceType')]
    public ?string $sourceType;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $timedOut
     */
    #[JsonProperty('timedOut')]
    public ?bool $timedOut;

    /**
     * @var ?int $totalSends
     */
    #[JsonProperty('totalSends')]
    public ?int $totalSends;

    /**
     * @var ?DateTime $trackingSince
     */
    #[JsonProperty('trackingSince'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $trackingSince;

    /**
     * @var ?int $truncatedSends
     */
    #[JsonProperty('truncatedSends')]
    public ?int $truncatedSends;

    /**
     * @var ?int $untrackedSends
     */
    #[JsonProperty('untrackedSends')]
    public ?int $untrackedSends;

    /**
     * @param array{
     *   abTestVariantId?: ?string,
     *   alerts?: ?array<array<string, mixed>>,
     *   baseline?: ?array<string, mixed>,
     *   blocks?: ?array<array<string, mixed>>,
     *   conditionGroups?: ?array<array<string, mixed>>,
     *   failClosedSends?: ?int,
     *   goalId?: ?string,
     *   recordedSends?: ?int,
     *   sourceId?: ?string,
     *   sourceName?: ?string,
     *   sourceType?: ?value-of<GetTransactionalConditionalBlockStatsResponseSourceType>,
     *   success?: ?bool,
     *   timedOut?: ?bool,
     *   totalSends?: ?int,
     *   trackingSince?: ?DateTime,
     *   truncatedSends?: ?int,
     *   untrackedSends?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTestVariantId = $values['abTestVariantId'] ?? null;
        $this->alerts = $values['alerts'] ?? null;
        $this->baseline = $values['baseline'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->conditionGroups = $values['conditionGroups'] ?? null;
        $this->failClosedSends = $values['failClosedSends'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->recordedSends = $values['recordedSends'] ?? null;
        $this->sourceId = $values['sourceId'] ?? null;
        $this->sourceName = $values['sourceName'] ?? null;
        $this->sourceType = $values['sourceType'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->timedOut = $values['timedOut'] ?? null;
        $this->totalSends = $values['totalSends'] ?? null;
        $this->trackingSince = $values['trackingSince'] ?? null;
        $this->truncatedSends = $values['truncatedSends'] ?? null;
        $this->untrackedSends = $values['untrackedSends'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
