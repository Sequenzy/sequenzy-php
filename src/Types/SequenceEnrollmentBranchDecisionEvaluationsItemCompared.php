<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentBranchDecisionEvaluationsItemCompared extends JsonSerializableType
{
    /**
     * @var ?value-of<SequenceEnrollmentBranchDecisionEvaluationsItemComparedKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?bool $present
     */
    #[JsonProperty('present')]
    public ?bool $present;

    /**
     * @var ?value-of<SequenceEnrollmentBranchDecisionEvaluationsItemComparedSummary> $summary
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @param array{
     *   kind?: ?value-of<SequenceEnrollmentBranchDecisionEvaluationsItemComparedKind>,
     *   present?: ?bool,
     *   summary?: ?value-of<SequenceEnrollmentBranchDecisionEvaluationsItemComparedSummary>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->kind = $values['kind'] ?? null;
        $this->present = $values['present'] ?? null;
        $this->summary = $values['summary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
