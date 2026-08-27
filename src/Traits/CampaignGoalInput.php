<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\CampaignGoalInputAttributeCondition;
use Sequenzy\Types\CampaignGoalInputTriggerType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * @property ?value-of<CampaignGoalInputAttributeCondition> $attributeCondition
 * @property ?string $attributePath
 * @property ?string $attributePreviousValue
 * @property ?string $attributeValue
 * @property ?int $attributionWindowHours
 * @property ?string $description
 * @property ?string $eventPropertyLabel
 * @property ?string $eventPropertyName
 * @property ?bool $isActive
 * @property ?string $name
 * @property ?string $triggerEventName
 * @property ?string $triggerTagName
 * @property ?value-of<CampaignGoalInputTriggerType> $triggerType
 */
trait CampaignGoalInput
{
    /**
     * @var ?value-of<CampaignGoalInputAttributeCondition> $attributeCondition
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
     * @var ?value-of<CampaignGoalInputTriggerType> $triggerType
     */
    #[JsonProperty('triggerType')]
    public ?string $triggerType;
}
