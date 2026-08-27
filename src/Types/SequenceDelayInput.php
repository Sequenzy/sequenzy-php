<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Delay before this step runs. Use duration fields for fixed waits, mode until_date with untilDateField for event/date-field waits, or mode until_weekday with the weekday window fields.
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
     * @var ?string $untilDateField Event/subscriber date field path to wait until when mode is until_date.
     */
    #[JsonProperty('untilDateField')]
    public ?string $untilDateField;

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
     *   minutes?: ?float,
     *   missingAction?: ?value-of<SequenceDelayInputMissingAction>,
     *   mode?: ?value-of<SequenceDelayInputMode>,
     *   untilDateField?: ?string,
     *   untilDays?: ?array<string>,
     *   untilEndTime?: ?string,
     *   untilMissingAction?: ?value-of<SequenceDelayInputUntilMissingAction>,
     *   untilOffsetDirection?: ?value-of<SequenceDelayInputUntilOffsetDirection>,
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
        $this->minutes = $values['minutes'] ?? null;
        $this->missingAction = $values['missingAction'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->untilDateField = $values['untilDateField'] ?? null;
        $this->untilDays = $values['untilDays'] ?? null;
        $this->untilEndTime = $values['untilEndTime'] ?? null;
        $this->untilMissingAction = $values['untilMissingAction'] ?? null;
        $this->untilOffsetDirection = $values['untilOffsetDirection'] ?? null;
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
