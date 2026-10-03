<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Delay before this step runs. Use duration fields for fixed waits, mode until_date with untilDateField for a date from the trigger event or a contact attribute (untilDateSource), mode until_weekday with the weekday window fields, or mode until_key_date with untilKeyDate (prefer the waitUntilKeyDate shorthand).
 */
class SequenceDelayInput extends JsonSerializableType
{
    /**
     * @var ?float $days
     */
    #[JsonProperty('days')]
    public ?float $days;

    /**
     * @var ?value-of<SequenceDelayInputDirection> $direction Alias for untilOffsetDirection.
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?string $field Alias for untilDateField.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?float $hours
     */
    #[JsonProperty('hours')]
    public ?float $hours;

    /**
     * @var ?string $keyDate Alias for untilKeyDate.
     */
    #[JsonProperty('keyDate')]
    public ?string $keyDate;

    /**
     * @var ?float $minutes
     */
    #[JsonProperty('minutes')]
    public ?float $minutes;

    /**
     * @var ?value-of<SequenceDelayInputMissingAction> $missingAction Alias for untilMissingAction.
     */
    #[JsonProperty('missingAction')]
    public ?string $missingAction;

    /**
     * @var ?value-of<SequenceDelayInputMode> $mode Delay mode. Defaults to duration.
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?value-of<SequenceDelayInputPastAction> $pastAction Alias for untilPastAction.
     */
    #[JsonProperty('pastAction')]
    public ?string $pastAction;

    /**
     * @var ?value-of<SequenceDelayInputSource> $source Alias for untilDateSource.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?string $untilDateField Date field path to wait until when mode is until_date, read from the source chosen by untilDateSource.
     */
    #[JsonProperty('untilDateField')]
    public ?string $untilDateField;

    /**
     * @var ?value-of<SequenceDelayInputUntilDateSource> $untilDateSource Where untilDateField is read from when mode is until_date. event reads the trigger event properties; attribute reads the contact's custom attributes when the step is reached. Defaults to event.
     */
    #[JsonProperty('untilDateSource')]
    public ?string $untilDateSource;

    /**
     * @var ?array<string> $untilDays Weekdays the wait may release on when mode is until_weekday.
     */
    #[JsonProperty('untilDays'), ArrayType(['string'])]
    public ?array $untilDays;

    /**
     * @var ?string $untilEndTime Window end in 24-hour HH:mm local time when mode is until_weekday. Defaults to the end-of-day boundary 24:00.
     */
    #[JsonProperty('untilEndTime')]
    public ?string $untilEndTime;

    /**
     * @var ?string $untilKeyDate Key of a sequence key date to wait relative to when mode is until_key_date.
     */
    #[JsonProperty('untilKeyDate')]
    public ?string $untilKeyDate;

    /**
     * @var ?value-of<SequenceDelayInputUntilMissingAction> $untilMissingAction What to do when the date field is missing or invalid. Defaults to continue.
     */
    #[JsonProperty('untilMissingAction')]
    public ?string $untilMissingAction;

    /**
     * @var ?value-of<SequenceDelayInputUntilOffsetDirection> $untilOffsetDirection Whether the offset runs before or after the date field. Defaults to after.
     */
    #[JsonProperty('untilOffsetDirection')]
    public ?string $untilOffsetDirection;

    /**
     * @var ?value-of<SequenceDelayInputUntilPastAction> $untilPastAction For until_key_date and until_date, what a late enrollee does when the moment already passed. continue moves on immediately, skip skips the following email and action steps until the next wait, condition or branch, exit ends the enrollment. Defaults to skip for until_key_date and continue for until_date.
     */
    #[JsonProperty('untilPastAction')]
    public ?string $untilPastAction;

    /**
     * @var ?string $untilStartTime Window start in 24-hour HH:mm local time when mode is until_weekday.
     */
    #[JsonProperty('untilStartTime')]
    public ?string $untilStartTime;

    /**
     * @var ?string $untilTimezone IANA timezone used to evaluate the window when mode is until_weekday.
     */
    #[JsonProperty('untilTimezone')]
    public ?string $untilTimezone;

    /**
     * @param array{
     *   days?: ?float,
     *   direction?: ?value-of<SequenceDelayInputDirection>,
     *   field?: ?string,
     *   hours?: ?float,
     *   keyDate?: ?string,
     *   minutes?: ?float,
     *   missingAction?: ?value-of<SequenceDelayInputMissingAction>,
     *   mode?: ?value-of<SequenceDelayInputMode>,
     *   pastAction?: ?value-of<SequenceDelayInputPastAction>,
     *   source?: ?value-of<SequenceDelayInputSource>,
     *   untilDateField?: ?string,
     *   untilDateSource?: ?value-of<SequenceDelayInputUntilDateSource>,
     *   untilDays?: ?array<string>,
     *   untilEndTime?: ?string,
     *   untilKeyDate?: ?string,
     *   untilMissingAction?: ?value-of<SequenceDelayInputUntilMissingAction>,
     *   untilOffsetDirection?: ?value-of<SequenceDelayInputUntilOffsetDirection>,
     *   untilPastAction?: ?value-of<SequenceDelayInputUntilPastAction>,
     *   untilStartTime?: ?string,
     *   untilTimezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->days = $values['days'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->field = $values['field'] ?? null;
        $this->hours = $values['hours'] ?? null;
        $this->keyDate = $values['keyDate'] ?? null;
        $this->minutes = $values['minutes'] ?? null;
        $this->missingAction = $values['missingAction'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->pastAction = $values['pastAction'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->untilDateField = $values['untilDateField'] ?? null;
        $this->untilDateSource = $values['untilDateSource'] ?? null;
        $this->untilDays = $values['untilDays'] ?? null;
        $this->untilEndTime = $values['untilEndTime'] ?? null;
        $this->untilKeyDate = $values['untilKeyDate'] ?? null;
        $this->untilMissingAction = $values['untilMissingAction'] ?? null;
        $this->untilOffsetDirection = $values['untilOffsetDirection'] ?? null;
        $this->untilPastAction = $values['untilPastAction'] ?? null;
        $this->untilStartTime = $values['untilStartTime'] ?? null;
        $this->untilTimezone = $values['untilTimezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
