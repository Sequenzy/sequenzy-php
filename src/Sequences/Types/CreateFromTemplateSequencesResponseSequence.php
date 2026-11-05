<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateFromTemplateSequencesResponseSequence extends JsonSerializableType
{
    /**
     * @var ?array<value-of<CreateFromTemplateSequencesResponseSequenceChannelsItem>> $channels
     */
    #[JsonProperty('channels'), ArrayType(['string'])]
    public ?array $channels;

    /**
     * @var ?value-of<CreateFromTemplateSequencesResponseSequenceChannelStrategy> $channelStrategy
     */
    #[JsonProperty('channelStrategy')]
    public ?string $channelStrategy;

    /**
     * @var ?int $emailCount
     */
    #[JsonProperty('emailCount')]
    public ?int $emailCount;

    /**
     * @var ?value-of<CreateFromTemplateSequencesResponseSequenceEnrichmentStatus> $enrichmentStatus
     */
    #[JsonProperty('enrichmentStatus')]
    public ?string $enrichmentStatus;

    /**
     * @var ?bool $frequencyCapEnabled
     */
    #[JsonProperty('frequencyCapEnabled')]
    public ?bool $frequencyCapEnabled;

    /**
     * @var ?string $goalId Attribution goal created with the sequence.
     */
    #[JsonProperty('goalId')]
    public ?string $goalId;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $inAppCount
     */
    #[JsonProperty('inAppCount')]
    public ?int $inAppCount;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $pushCount
     */
    #[JsonProperty('pushCount')]
    public ?int $pushCount;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $templateId
     */
    #[JsonProperty('templateId')]
    public ?string $templateId;

    /**
     * @var ?array<string, mixed> $trigger The template trigger (type, eventName, tagName, inactiveDays, description).
     */
    #[JsonProperty('trigger'), ArrayType(['string' => 'mixed'])]
    public ?array $trigger;

    /**
     * @param array{
     *   channels?: ?array<value-of<CreateFromTemplateSequencesResponseSequenceChannelsItem>>,
     *   channelStrategy?: ?value-of<CreateFromTemplateSequencesResponseSequenceChannelStrategy>,
     *   emailCount?: ?int,
     *   enrichmentStatus?: ?value-of<CreateFromTemplateSequencesResponseSequenceEnrichmentStatus>,
     *   frequencyCapEnabled?: ?bool,
     *   goalId?: ?string,
     *   id?: ?string,
     *   inAppCount?: ?int,
     *   name?: ?string,
     *   pushCount?: ?int,
     *   status?: ?string,
     *   templateId?: ?string,
     *   trigger?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->channels = $values['channels'] ?? null;
        $this->channelStrategy = $values['channelStrategy'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->enrichmentStatus = $values['enrichmentStatus'] ?? null;
        $this->frequencyCapEnabled = $values['frequencyCapEnabled'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->inAppCount = $values['inAppCount'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->pushCount = $values['pushCount'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
