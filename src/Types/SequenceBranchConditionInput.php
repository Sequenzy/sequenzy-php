<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceBranchConditionInput extends JsonSerializableType
{
    /**
     * @var ?value-of<SequenceBranchConditionInputActivityScope> $activityScope Scope for event_received and link_clicked conditions.
     */
    #[JsonProperty('activityScope')]
    public ?string $activityScope;

    /**
     * @var ?value-of<SequenceBranchConditionInputConditionType> $conditionType Condition for this path. Required on a condition split; must be omitted when the branch sets splitMode to random, where paths are chosen by percentage.
     */
    #[JsonProperty('conditionType')]
    public ?string $conditionType;

    /**
     * @var ?string $eventName Event name for event_received conditions.
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?string $fieldName Subscriber attribute name for field conditions.
     */
    #[JsonProperty('fieldName')]
    public ?string $fieldName;

    /**
     * @var ?string $fieldValue Comparison value for field conditions.
     */
    #[JsonProperty('fieldValue')]
    public ?string $fieldValue;

    /**
     * @var ?string $id Optional stable branch ID. Defaults to branch-0, branch-1, etc.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $linkUrl Optional URL substring for link_clicked conditions. Omit to match any clicked link.
     */
    #[JsonProperty('linkUrl')]
    public ?string $linkUrl;

    /**
     * @var ?string $listId List ID for in_list conditions.
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?string $segmentId Segment ID for in_segment conditions.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var ?string $segmentName Optional display name for in_segment conditions.
     */
    #[JsonProperty('segmentName')]
    public ?string $segmentName;

    /**
     * @var ?array<SequenceBranchPathStepInput> $steps Optional steps to create in this branch path. When targetNodeId is also set, the final new step connects to that existing node.
     */
    #[JsonProperty('steps'), ArrayType([SequenceBranchPathStepInput::class])]
    public ?array $steps;

    /**
     * @var ?string $tagId Tag ID or tag name for has_tag and does_not_have_tag conditions.
     */
    #[JsonProperty('tagId')]
    public ?string $tagId;

    /**
     * @var ?string $tagName Tag name for has_tag and does_not_have_tag conditions.
     */
    #[JsonProperty('tagName')]
    public ?string $tagName;

    /**
     * @var ?string $targetNodeId Existing node reached by this branch path after any newly created steps. Use the completion node ID to end this path immediately.
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   activityScope?: ?value-of<SequenceBranchConditionInputActivityScope>,
     *   conditionType?: ?value-of<SequenceBranchConditionInputConditionType>,
     *   eventName?: ?string,
     *   fieldName?: ?string,
     *   fieldValue?: ?string,
     *   id?: ?string,
     *   label?: ?string,
     *   linkUrl?: ?string,
     *   listId?: ?string,
     *   segmentId?: ?string,
     *   segmentName?: ?string,
     *   steps?: ?array<SequenceBranchPathStepInput>,
     *   tagId?: ?string,
     *   tagName?: ?string,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activityScope = $values['activityScope'] ?? null;
        $this->conditionType = $values['conditionType'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->fieldName = $values['fieldName'] ?? null;
        $this->fieldValue = $values['fieldValue'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->linkUrl = $values['linkUrl'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->segmentName = $values['segmentName'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->tagId = $values['tagId'] ?? null;
        $this->tagName = $values['tagName'] ?? null;
        $this->targetNodeId = $values['targetNodeId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
