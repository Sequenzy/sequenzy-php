<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\CampaignGoalInput;
use Sequenzy\Types\CampaignGoalInputAttributeCondition;
use Sequenzy\Types\CampaignGoalInputTriggerType;

class CreateGoalCampaignsRequest extends JsonSerializableType
{
    use CampaignGoalInput;


    /**
     * @param array{
     *   attributeCondition?: ?value-of<CampaignGoalInputAttributeCondition>,
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
     *   triggerType?: ?value-of<CampaignGoalInputTriggerType>,
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
