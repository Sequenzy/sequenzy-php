<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceBranchInput extends JsonSerializableType
{
    /**
     * @var string $afterNodeId Existing sequence node ID to insert the branch after.
     */
    #[JsonProperty('afterNodeId')]
    public string $afterNodeId;

    /**
     * @var ?bool $allowEmptyPaths Set true only when intentionally creating empty UI placeholders. Explicit target node paths do not require this flag.
     */
    #[JsonProperty('allowEmptyPaths')]
    public ?bool $allowEmptyPaths;

    /**
     * @var array<SequenceBranchConditionInput> $branches Branch paths. On a condition split they are evaluated in order and an else fallback is created automatically. On a random split each entry is a weighted variant. Each branch should include steps, targetNodeId, or both unless allowEmptyPaths is true.
     */
    #[JsonProperty('branches'), ArrayType([SequenceBranchConditionInput::class])]
    public array $branches;

    /**
     * @var ?array<SequenceBranchPathStepInput> $elseSteps Optional steps to create in the else fallback path. When elseTargetNodeId is also set, the final new step connects to that existing node. Rejected when splitMode is random.
     */
    #[JsonProperty('elseSteps'), ArrayType([SequenceBranchPathStepInput::class])]
    public ?array $elseSteps;

    /**
     * @var ?string $elseTargetNodeId Existing node reached by the else fallback path after any elseSteps. Use the original follow-up node to keep that path in the existing flow, or the completion node to end it. Rejected when splitMode is random.
     */
    #[JsonProperty('elseTargetNodeId')]
    public ?string $elseTargetNodeId;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?array<float> $randomPercentages Required when splitMode is random. One non-negative percentage per entry in branches, in the same order, summing to 100.
     */
    #[JsonProperty('randomPercentages'), ArrayType(['float'])]
    public ?array $randomPercentages;

    /**
     * @var ?value-of<SequenceBranchInputSplitMode> $splitMode How subscribers are routed. condition evaluates each branch's conditionType in order. random assigns each subscriber a path by percentage when they reach the node, which runs a concurrent A/B test inside the sequence. A random split requires randomPercentages, omits conditionType and condition-specific fields on every branch, and has no else path.
     */
    #[JsonProperty('splitMode')]
    public ?string $splitMode;

    /**
     * @param array{
     *   afterNodeId: string,
     *   branches: array<SequenceBranchConditionInput>,
     *   allowEmptyPaths?: ?bool,
     *   elseSteps?: ?array<SequenceBranchPathStepInput>,
     *   elseTargetNodeId?: ?string,
     *   label?: ?string,
     *   randomPercentages?: ?array<float>,
     *   splitMode?: ?value-of<SequenceBranchInputSplitMode>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->afterNodeId = $values['afterNodeId'];
        $this->allowEmptyPaths = $values['allowEmptyPaths'] ?? null;
        $this->branches = $values['branches'];
        $this->elseSteps = $values['elseSteps'] ?? null;
        $this->elseTargetNodeId = $values['elseTargetNodeId'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->randomPercentages = $values['randomPercentages'] ?? null;
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
