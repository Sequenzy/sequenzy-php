<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * One if/else or random-split verdict. Compared values are summaries, never the raw recipient value.
 */
class SequenceEnrollmentBranchDecision extends JsonSerializableType
{
    /**
     * @var ?DateTime $decidedAt
     */
    #[JsonProperty('decidedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $decidedAt;

    /**
     * @var ?array<SequenceEnrollmentBranchDecisionEvaluationsItem> $evaluations
     */
    #[JsonProperty('evaluations'), ArrayType([SequenceEnrollmentBranchDecisionEvaluationsItem::class])]
    public ?array $evaluations;

    /**
     * @var ?string $matchedBranchId
     */
    #[JsonProperty('matchedBranchId')]
    public ?string $matchedBranchId;

    /**
     * @var ?int $matchedBranchIndex
     */
    #[JsonProperty('matchedBranchIndex')]
    public ?int $matchedBranchIndex;

    /**
     * @var ?string $nodeId
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?string $routedEdgeBranchId
     */
    #[JsonProperty('routedEdgeBranchId')]
    public ?string $routedEdgeBranchId;

    /**
     * @var ?value-of<SequenceEnrollmentBranchDecisionSelectedPath> $selectedPath
     */
    #[JsonProperty('selectedPath')]
    public ?string $selectedPath;

    /**
     * @var ?value-of<SequenceEnrollmentBranchDecisionSplitMode> $splitMode
     */
    #[JsonProperty('splitMode')]
    public ?string $splitMode;

    /**
     * @param array{
     *   decidedAt?: ?DateTime,
     *   evaluations?: ?array<SequenceEnrollmentBranchDecisionEvaluationsItem>,
     *   matchedBranchId?: ?string,
     *   matchedBranchIndex?: ?int,
     *   nodeId?: ?string,
     *   routedEdgeBranchId?: ?string,
     *   selectedPath?: ?value-of<SequenceEnrollmentBranchDecisionSelectedPath>,
     *   splitMode?: ?value-of<SequenceEnrollmentBranchDecisionSplitMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->decidedAt = $values['decidedAt'] ?? null;
        $this->evaluations = $values['evaluations'] ?? null;
        $this->matchedBranchId = $values['matchedBranchId'] ?? null;
        $this->matchedBranchIndex = $values['matchedBranchIndex'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->routedEdgeBranchId = $values['routedEdgeBranchId'] ?? null;
        $this->selectedPath = $values['selectedPath'] ?? null;
        $this->splitMode = $values['splitMode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
