<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Wait until a date from the trigger event or a contact attribute, optionally offset before or after that date. The value must be an ISO 8601 date or a Unix timestamp in seconds or milliseconds.
 */
class SequenceWaitUntilInput extends JsonSerializableType
{
    /**
     * @var ?float $days Shorthand offset days when offset is omitted.
     */
    #[JsonProperty('days')]
    public ?float $days;

    /**
     * @var ?value-of<SequenceWaitUntilInputDirection> $direction Whether the offset runs before or after the field date. Defaults to after.
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?string $field Date field path to wait until, read from the source.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?float $hours Shorthand offset hours when offset is omitted.
     */
    #[JsonProperty('hours')]
    public ?float $hours;

    /**
     * @var ?float $minutes Shorthand offset minutes when offset is omitted.
     */
    #[JsonProperty('minutes')]
    public ?float $minutes;

    /**
     * @var ?value-of<SequenceWaitUntilInputMissingAction> $missingAction What to do when the date field is missing or invalid. Defaults to continue.
     */
    #[JsonProperty('missingAction')]
    public ?string $missingAction;

    /**
     * @var ?SequenceDelayOffsetInput $offset
     */
    #[JsonProperty('offset')]
    public ?SequenceDelayOffsetInput $offset;

    /**
     * @var ?value-of<SequenceWaitUntilInputPastAction> $pastAction What to do when the date, after the offset, already passed when the contact reaches this wait. continue moves on immediately, skip skips the following email and action steps until the next wait, condition or branch so late joiners only get what is still ahead, exit ends the enrollment. Defaults to continue.
     */
    #[JsonProperty('pastAction')]
    public ?string $pastAction;

    /**
     * @var ?value-of<SequenceWaitUntilInputSource> $source Where field is read from. event reads the trigger event properties and needs an event trigger. attribute reads the contact's custom attributes when the step is reached, so it works with any trigger. If the date moves later while a contact is waiting, the contact waits for the new date; moving it earlier does not release them sooner, and a date removed while waiting follows missingAction. Defaults to event.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?string $untilDateField Alias for field.
     */
    #[JsonProperty('untilDateField')]
    public ?string $untilDateField;

    /**
     * @var ?value-of<SequenceWaitUntilInputUntilDateSource> $untilDateSource Alias for source.
     */
    #[JsonProperty('untilDateSource')]
    public ?string $untilDateSource;

    /**
     * @var ?value-of<SequenceWaitUntilInputUntilMissingAction> $untilMissingAction Alias for missingAction.
     */
    #[JsonProperty('untilMissingAction')]
    public ?string $untilMissingAction;

    /**
     * @var ?value-of<SequenceWaitUntilInputUntilOffsetDirection> $untilOffsetDirection Alias for direction.
     */
    #[JsonProperty('untilOffsetDirection')]
    public ?string $untilOffsetDirection;

    /**
     * @var ?value-of<SequenceWaitUntilInputUntilPastAction> $untilPastAction Alias for pastAction.
     */
    #[JsonProperty('untilPastAction')]
    public ?string $untilPastAction;

    /**
     * @param array{
     *   days?: ?float,
     *   direction?: ?value-of<SequenceWaitUntilInputDirection>,
     *   field?: ?string,
     *   hours?: ?float,
     *   minutes?: ?float,
     *   missingAction?: ?value-of<SequenceWaitUntilInputMissingAction>,
     *   offset?: ?SequenceDelayOffsetInput,
     *   pastAction?: ?value-of<SequenceWaitUntilInputPastAction>,
     *   source?: ?value-of<SequenceWaitUntilInputSource>,
     *   untilDateField?: ?string,
     *   untilDateSource?: ?value-of<SequenceWaitUntilInputUntilDateSource>,
     *   untilMissingAction?: ?value-of<SequenceWaitUntilInputUntilMissingAction>,
     *   untilOffsetDirection?: ?value-of<SequenceWaitUntilInputUntilOffsetDirection>,
     *   untilPastAction?: ?value-of<SequenceWaitUntilInputUntilPastAction>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->days = $values['days'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->field = $values['field'] ?? null;
        $this->hours = $values['hours'] ?? null;
        $this->minutes = $values['minutes'] ?? null;
        $this->missingAction = $values['missingAction'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->pastAction = $values['pastAction'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->untilDateField = $values['untilDateField'] ?? null;
        $this->untilDateSource = $values['untilDateSource'] ?? null;
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
