<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateFromExampleSequencesResponseSequence extends JsonSerializableType
{
    /**
     * @var ?int $emailCount
     */
    #[JsonProperty('emailCount')]
    public ?int $emailCount;

    /**
     * @var ?value-of<CreateFromExampleSequencesResponseSequenceEnrichmentStatus> $enrichmentStatus `processing` while AI writes the emails; poll Get Sequence, which reports `pending`, then `in_progress`, then `complete`. `not_queued` means the draft exists but writing could not start: open it in the dashboard to write the emails, and do not create it again.
     */
    #[JsonProperty('enrichmentStatus')]
    public ?string $enrichmentStatus;

    /**
     * @var ?string $eventName Entry event for event triggers (`ecommerce.cart_abandoned` or `ecommerce.order_placed`).
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

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
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<CreateFromExampleSequencesResponseSequenceStepsItem> $steps
     */
    #[JsonProperty('steps'), ArrayType([CreateFromExampleSequencesResponseSequenceStepsItem::class])]
    public ?array $steps;

    /**
     * @var ?CreateFromExampleSequencesResponseSequenceStopCondition $stopCondition The early exit rule the sequence was created with, when it has one. Abandoned cart stops on `ecommerce.order_placed`; re-engagement stops when the `inactive` tag is removed (`does_not_have_tag`).
     */
    #[JsonProperty('stopCondition')]
    public ?CreateFromExampleSequencesResponseSequenceStopCondition $stopCondition;

    /**
     * @var ?string $tagName Entry tag for tag triggers (`inactive` for re-engagement).
     */
    #[JsonProperty('tagName')]
    public ?string $tagName;

    /**
     * @var ?string $trigger Trigger node type, such as `trigger_list` or `trigger_event`.
     */
    #[JsonProperty('trigger')]
    public ?string $trigger;

    /**
     * @var ?string $triggerDescription
     */
    #[JsonProperty('triggerDescription')]
    public ?string $triggerDescription;

    /**
     * @param array{
     *   emailCount?: ?int,
     *   enrichmentStatus?: ?value-of<CreateFromExampleSequencesResponseSequenceEnrichmentStatus>,
     *   eventName?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     *   status?: ?string,
     *   steps?: ?array<CreateFromExampleSequencesResponseSequenceStepsItem>,
     *   stopCondition?: ?CreateFromExampleSequencesResponseSequenceStopCondition,
     *   tagName?: ?string,
     *   trigger?: ?string,
     *   triggerDescription?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailCount = $values['emailCount'] ?? null;
        $this->enrichmentStatus = $values['enrichmentStatus'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->stopCondition = $values['stopCondition'] ?? null;
        $this->tagName = $values['tagName'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
        $this->triggerDescription = $values['triggerDescription'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
