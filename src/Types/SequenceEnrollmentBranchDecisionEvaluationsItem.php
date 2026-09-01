<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentBranchDecisionEvaluationsItem extends JsonSerializableType
{
    /**
     * @var ?string $branchId
     */
    #[JsonProperty('branchId')]
    public ?string $branchId;

    /**
     * @var ?int $branchIndex
     */
    #[JsonProperty('branchIndex')]
    public ?int $branchIndex;

    /**
     * @var ?SequenceEnrollmentBranchDecisionEvaluationsItemCompared $compared
     */
    #[JsonProperty('compared')]
    public ?SequenceEnrollmentBranchDecisionEvaluationsItemCompared $compared;

    /**
     * @var ?string $conditionType
     */
    #[JsonProperty('conditionType')]
    public ?string $conditionType;

    /**
     * @var ?string $fieldName
     */
    #[JsonProperty('fieldName')]
    public ?string $fieldName;

    /**
     * @var ?value-of<SequenceEnrollmentBranchDecisionEvaluationsItemOutcome> $outcome
     */
    #[JsonProperty('outcome')]
    public ?string $outcome;

    /**
     * @var ?string $reason Human-readable, already redacted. Never includes the compared value.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   branchId?: ?string,
     *   branchIndex?: ?int,
     *   compared?: ?SequenceEnrollmentBranchDecisionEvaluationsItemCompared,
     *   conditionType?: ?string,
     *   fieldName?: ?string,
     *   outcome?: ?value-of<SequenceEnrollmentBranchDecisionEvaluationsItemOutcome>,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->branchId = $values['branchId'] ?? null;
        $this->branchIndex = $values['branchIndex'] ?? null;
        $this->compared = $values['compared'] ?? null;
        $this->conditionType = $values['conditionType'] ?? null;
        $this->fieldName = $values['fieldName'] ?? null;
        $this->outcome = $values['outcome'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
