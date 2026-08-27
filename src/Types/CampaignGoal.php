<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CampaignGoal extends JsonSerializableType
{
    /**
     * @var ?value-of<CampaignGoalAttributeCondition> $attributeCondition
     */
    #[JsonProperty('attributeCondition')]
    public ?string $attributeCondition;

    /**
     * @var ?string $attributePath
     */
    #[JsonProperty('attributePath')]
    public ?string $attributePath;

    /**
     * @var ?string $attributePreviousValue
     */
    #[JsonProperty('attributePreviousValue')]
    public ?string $attributePreviousValue;

    /**
     * @var ?string $attributeValue
     */
    #[JsonProperty('attributeValue')]
    public ?string $attributeValue;

    /**
     * @var ?int $attributionWindowHours
     */
    #[JsonProperty('attributionWindowHours')]
    public ?int $attributionWindowHours;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $eventPropertyLabel
     */
    #[JsonProperty('eventPropertyLabel')]
    public ?string $eventPropertyLabel;

    /**
     * @var ?string $eventPropertyName
     */
    #[JsonProperty('eventPropertyName')]
    public ?string $eventPropertyName;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isActive
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<CampaignGoalScope> $scope
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @var ?string $triggerEventName
     */
    #[JsonProperty('triggerEventName')]
    public ?string $triggerEventName;

    /**
     * @var ?string $triggerTagName
     */
    #[JsonProperty('triggerTagName')]
    public ?string $triggerTagName;

    /**
     * @var ?value-of<CampaignGoalTriggerType> $triggerType
     */
    #[JsonProperty('triggerType')]
    public ?string $triggerType;

    /**
     * @param array{
     *   attributeCondition?: ?value-of<CampaignGoalAttributeCondition>,
     *   attributePath?: ?string,
     *   attributePreviousValue?: ?string,
     *   attributeValue?: ?string,
     *   attributionWindowHours?: ?int,
     *   campaignId?: ?string,
     *   description?: ?string,
     *   eventPropertyLabel?: ?string,
     *   eventPropertyName?: ?string,
     *   id?: ?string,
     *   isActive?: ?bool,
     *   name?: ?string,
     *   scope?: ?value-of<CampaignGoalScope>,
     *   triggerEventName?: ?string,
     *   triggerTagName?: ?string,
     *   triggerType?: ?value-of<CampaignGoalTriggerType>,
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
        $this->campaignId = $values['campaignId'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->eventPropertyLabel = $values['eventPropertyLabel'] ?? null;
        $this->eventPropertyName = $values['eventPropertyName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->triggerEventName = $values['triggerEventName'] ?? null;
        $this->triggerTagName = $values['triggerTagName'] ?? null;
        $this->triggerType = $values['triggerType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
