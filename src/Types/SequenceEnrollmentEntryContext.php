<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Event or manual-enrollment context captured at entry. Property keys only; values from the enrolling payload are never returned.
 */
class SequenceEnrollmentEntryContext extends JsonSerializableType
{
    /**
     * @var ?string $eventId Durable ID of the enrolling event, or null.
     */
    #[JsonProperty('eventId')]
    public ?string $eventId;

    /**
     * @var ?string $eventName Enrolling event name, or null.
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?array<string> $eventPropertyKeys Keys present on the enrolling event payload. Values are omitted.
     */
    #[JsonProperty('eventPropertyKeys'), ArrayType(['string'])]
    public ?array $eventPropertyKeys;

    /**
     * @var ?array<string> $fieldSnapshotKeys Subscriber field paths snapshotted at enrollment. Values are omitted.
     */
    #[JsonProperty('fieldSnapshotKeys'), ArrayType(['string'])]
    public ?array $fieldSnapshotKeys;

    /**
     * @var ?bool $hasEventProperties Whether any event property keys were stored on this enrollment.
     */
    #[JsonProperty('hasEventProperties')]
    public ?bool $hasEventProperties;

    /**
     * @var ?bool $hasFieldSnapshots Whether subscriber field snapshots were stored at enrollment.
     */
    #[JsonProperty('hasFieldSnapshots')]
    public ?bool $hasFieldSnapshots;

    /**
     * @var ?string $triggerType Stored entryTriggerType, such as event_received or manual_enrollment. Null when never stamped.
     */
    #[JsonProperty('triggerType')]
    public ?string $triggerType;

    /**
     * @param array{
     *   eventId?: ?string,
     *   eventName?: ?string,
     *   eventPropertyKeys?: ?array<string>,
     *   fieldSnapshotKeys?: ?array<string>,
     *   hasEventProperties?: ?bool,
     *   hasFieldSnapshots?: ?bool,
     *   triggerType?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventId = $values['eventId'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->eventPropertyKeys = $values['eventPropertyKeys'] ?? null;
        $this->fieldSnapshotKeys = $values['fieldSnapshotKeys'] ?? null;
        $this->hasEventProperties = $values['hasEventProperties'] ?? null;
        $this->hasFieldSnapshots = $values['hasFieldSnapshots'] ?? null;
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
