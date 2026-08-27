<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Aggregated poll / NPS answers for one poll block. Each subscriber counts once per block using their latest answer; multi-select polls (allowMultiple) count each subscriber once per selected option, so answer percentages can sum past 100. Returned as a top-level `polls` array by the campaign metrics endpoint when the campaign collected poll responses.
 */
class PollResultsSummary extends JsonSerializableType
{
    /**
     * @var ?bool $allowMultiple Present and true for multi-select polls, where recipients save a set of options from the hosted selection page and the attribute stores the list of selected values.
     */
    #[JsonProperty('allowMultiple')]
    public ?bool $allowMultiple;

    /**
     * @var ?array<PollResultsSummaryAnswersItem> $answers Ordered by responses (options) or by score 0-10 (NPS, zero-filled).
     */
    #[JsonProperty('answers'), ArrayType([PollResultsSummaryAnswersItem::class])]
    public ?array $answers;

    /**
     * @var ?string $attributeKey Subscriber attribute key where the current/latest response is stored. A later poll that reuses this key can overwrite it, so use a campaign-and-block-scoped pollResponse subscriber filter for an exact historical respondent drill-down. Omitted when the recorded responses carry no valid key.
     */
    #[JsonProperty('attributeKey')]
    public ?string $attributeKey;

    /**
     * @var ?string $blockId Poll block id inside the email content.
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var ?PollResultsSummaryNps $nps Present for NPS polls only.
     */
    #[JsonProperty('nps')]
    public ?PollResultsSummaryNps $nps;

    /**
     * @var ?string $question
     */
    #[JsonProperty('question')]
    public ?string $question;

    /**
     * @var ?int $totalResponses Number of respondents (subscribers whose latest answer selects at least one option; a cleared multi-select submit counts as no answer). Also the percentage denominator.
     */
    #[JsonProperty('totalResponses')]
    public ?int $totalResponses;

    /**
     * @var ?value-of<PollResultsSummaryVariant> $variant
     */
    #[JsonProperty('variant')]
    public ?string $variant;

    /**
     * @param array{
     *   allowMultiple?: ?bool,
     *   answers?: ?array<PollResultsSummaryAnswersItem>,
     *   attributeKey?: ?string,
     *   blockId?: ?string,
     *   nps?: ?PollResultsSummaryNps,
     *   question?: ?string,
     *   totalResponses?: ?int,
     *   variant?: ?value-of<PollResultsSummaryVariant>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowMultiple = $values['allowMultiple'] ?? null;
        $this->answers = $values['answers'] ?? null;
        $this->attributeKey = $values['attributeKey'] ?? null;
        $this->blockId = $values['blockId'] ?? null;
        $this->nps = $values['nps'] ?? null;
        $this->question = $values['question'] ?? null;
        $this->totalResponses = $values['totalResponses'] ?? null;
        $this->variant = $values['variant'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
