<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * A ready-made sequence template.
 */
class SequenceTemplateSummary extends JsonSerializableType
{
    /**
     * @var ?string $category
     */
    #[JsonProperty('category')]
    public ?string $category;

    /**
     * @var ?array<value-of<SequenceTemplateSummaryChannelsItem>> $channels
     */
    #[JsonProperty('channels'), ArrayType(['string'])]
    public ?array $channels;

    /**
     * @var ?value-of<SequenceTemplateSummaryChannelStrategy> $channelStrategy push_first_email_fallback branches on whether the contact is reachable by push; everyone else gets the email steps.
     */
    #[JsonProperty('channelStrategy')]
    public ?string $channelStrategy;

    /**
     * @var ?array<string, mixed> $continueCondition Checked before every step; the sequence stops for a contact once it no longer holds (has_tag, no_tag) or the event arrives (event_received).
     */
    #[JsonProperty('continueCondition'), ArrayType(['string' => 'mixed'])]
    public ?array $continueCondition;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $frequencyCapEnabled
     */
    #[JsonProperty('frequencyCapEnabled')]
    public ?bool $frequencyCapEnabled;

    /**
     * @var ?SequenceTemplateSummaryGoal $goal Attribution goal created with the sequence.
     */
    #[JsonProperty('goal')]
    public ?SequenceTemplateSummaryGoal $goal;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?SequenceTemplateSummaryQuietHours $quietHours Daytime window (contact's timezone) every send waits for.
     */
    #[JsonProperty('quietHours')]
    public ?SequenceTemplateSummaryQuietHours $quietHours;

    /**
     * @var ?SequenceTemplateSummaryRequiresIntegration $requiresIntegration
     */
    #[JsonProperty('requiresIntegration')]
    public ?SequenceTemplateSummaryRequiresIntegration $requiresIntegration;

    /**
     * @var ?array<SequenceTemplateSummaryStepsItem> $steps
     */
    #[JsonProperty('steps'), ArrayType([SequenceTemplateSummaryStepsItem::class])]
    public ?array $steps;

    /**
     * @var ?value-of<SequenceTemplateSummaryTargetAudience> $targetAudience
     */
    #[JsonProperty('targetAudience')]
    public ?string $targetAudience;

    /**
     * @var ?SequenceTemplateSummaryTrigger $trigger
     */
    #[JsonProperty('trigger')]
    public ?SequenceTemplateSummaryTrigger $trigger;

    /**
     * @var ?array<value-of<SequenceTemplateSummaryWebsiteTypesItem>> $websiteTypes Categories the template is built for; null means every category.
     */
    #[JsonProperty('websiteTypes'), ArrayType(['string'])]
    public ?array $websiteTypes;

    /**
     * @param array{
     *   category?: ?string,
     *   channels?: ?array<value-of<SequenceTemplateSummaryChannelsItem>>,
     *   channelStrategy?: ?value-of<SequenceTemplateSummaryChannelStrategy>,
     *   continueCondition?: ?array<string, mixed>,
     *   description?: ?string,
     *   frequencyCapEnabled?: ?bool,
     *   goal?: ?SequenceTemplateSummaryGoal,
     *   id?: ?string,
     *   name?: ?string,
     *   quietHours?: ?SequenceTemplateSummaryQuietHours,
     *   requiresIntegration?: ?SequenceTemplateSummaryRequiresIntegration,
     *   steps?: ?array<SequenceTemplateSummaryStepsItem>,
     *   targetAudience?: ?value-of<SequenceTemplateSummaryTargetAudience>,
     *   trigger?: ?SequenceTemplateSummaryTrigger,
     *   websiteTypes?: ?array<value-of<SequenceTemplateSummaryWebsiteTypesItem>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->category = $values['category'] ?? null;
        $this->channels = $values['channels'] ?? null;
        $this->channelStrategy = $values['channelStrategy'] ?? null;
        $this->continueCondition = $values['continueCondition'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->frequencyCapEnabled = $values['frequencyCapEnabled'] ?? null;
        $this->goal = $values['goal'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->quietHours = $values['quietHours'] ?? null;
        $this->requiresIntegration = $values['requiresIntegration'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->targetAudience = $values['targetAudience'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->websiteTypes = $values['websiteTypes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
