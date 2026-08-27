<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SequenceGoalInput;
use Sequenzy\Types\SequenceGoalInputAttributeCondition;
use Sequenzy\Types\SequenceGoalInputTriggerType;

class CreateGoalSequencesRequest extends JsonSerializableType
{
    use SequenceGoalInput;


    /**
     * @param array{
     *   attributeCondition?: ?value-of<SequenceGoalInputAttributeCondition>,
     *   attributePath?: ?string,
     *   attributePreviousValue?: ?string,
     *   attributeValue?: ?string,
     *   attributionWindowHours?: ?int,
     *   description?: ?string,
     *   eventPropertyLabel?: ?string,
     *   eventPropertyName?: ?string,
     *   isActive?: ?bool,
     *   name?: ?string,
     *   triggerEventName?: ?string,
     *   triggerTagName?: ?string,
     *   triggerType?: ?value-of<SequenceGoalInputTriggerType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attributeCondition = $values['attributeCondition'] ?? null;
        $this->attributePath = $values['attributePath'] ?? null;
        $this->attributePreviousValue = $values['attributePreviousValue'] ?? null;
        $this->attributeValue = $values['attributeValue'] ?? null;
        $this->attributionWindowHours = $values['attributionWindowHours'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->eventPropertyLabel = $values['eventPropertyLabel'] ?? null;
        $this->eventPropertyName = $values['eventPropertyName'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->triggerEventName = $values['triggerEventName'] ?? null;
        $this->triggerTagName = $values['triggerTagName'] ?? null;
        $this->triggerType = $values['triggerType'] ?? null;
    }
}
