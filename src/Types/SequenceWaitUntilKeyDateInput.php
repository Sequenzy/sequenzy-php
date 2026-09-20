<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Wait relative to one of the sequence's key dates before this step, e.g. 7 days before black_friday_starts or 1 hour before black_friday_ends. The key must exist in the sequence's keyDates.
 */
class SequenceWaitUntilKeyDateInput extends JsonSerializableType
{
    /**
     * @var ?float $days Offset days shorthand. Ignored when offset is provided.
     */
    #[JsonProperty('days')]
    public ?float $days;

    /**
     * @var ?value-of<SequenceWaitUntilKeyDateInputDirection> $direction Whether the offset applies before or after the key date. Defaults to before.
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?float $hours Offset hours shorthand.
     */
    #[JsonProperty('hours')]
    public ?float $hours;

    /**
     * @var ?string $key Key date identifier from keyDates.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?float $minutes Offset minutes shorthand.
     */
    #[JsonProperty('minutes')]
    public ?float $minutes;

    /**
     * @var ?value-of<SequenceWaitUntilKeyDateInputMissingAction> $missingAction What to do when the key date no longer exists. Defaults to exit.
     */
    #[JsonProperty('missingAction')]
    public ?string $missingAction;

    /**
     * @var ?SequenceDelayOffsetInput $offset
     */
    #[JsonProperty('offset')]
    public ?SequenceDelayOffsetInput $offset;

    /**
     * @var ?value-of<SequenceWaitUntilKeyDateInputPastAction> $pastAction What a late enrollee does when the moment already passed. skip (default) skips the following steps until the next wait, continue sends immediately, exit ends the enrollment.
     */
    #[JsonProperty('pastAction')]
    public ?string $pastAction;

    /**
     * @var ?string $untilKeyDate Alias for key.
     */
    #[JsonProperty('untilKeyDate')]
    public ?string $untilKeyDate;

    /**
     * @var ?value-of<SequenceWaitUntilKeyDateInputUntilMissingAction> $untilMissingAction Alias for missingAction.
     */
    #[JsonProperty('untilMissingAction')]
    public ?string $untilMissingAction;

    /**
     * @var ?value-of<SequenceWaitUntilKeyDateInputUntilOffsetDirection> $untilOffsetDirection Alias for direction.
     */
    #[JsonProperty('untilOffsetDirection')]
    public ?string $untilOffsetDirection;

    /**
     * @var ?value-of<SequenceWaitUntilKeyDateInputUntilPastAction> $untilPastAction Alias for pastAction.
     */
    #[JsonProperty('untilPastAction')]
    public ?string $untilPastAction;

    /**
     * @param array{
     *   days?: ?float,
     *   direction?: ?value-of<SequenceWaitUntilKeyDateInputDirection>,
     *   hours?: ?float,
     *   key?: ?string,
     *   minutes?: ?float,
     *   missingAction?: ?value-of<SequenceWaitUntilKeyDateInputMissingAction>,
     *   offset?: ?SequenceDelayOffsetInput,
     *   pastAction?: ?value-of<SequenceWaitUntilKeyDateInputPastAction>,
     *   untilKeyDate?: ?string,
     *   untilMissingAction?: ?value-of<SequenceWaitUntilKeyDateInputUntilMissingAction>,
     *   untilOffsetDirection?: ?value-of<SequenceWaitUntilKeyDateInputUntilOffsetDirection>,
     *   untilPastAction?: ?value-of<SequenceWaitUntilKeyDateInputUntilPastAction>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->days = $values['days'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->hours = $values['hours'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->minutes = $values['minutes'] ?? null;
        $this->missingAction = $values['missingAction'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->pastAction = $values['pastAction'] ?? null;
        $this->untilKeyDate = $values['untilKeyDate'] ?? null;
        $this->untilMissingAction = $values['untilMissingAction'] ?? null;
        $this->untilOffsetDirection = $values['untilOffsetDirection'] ?? null;
        $this->untilPastAction = $values['untilPastAction'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
