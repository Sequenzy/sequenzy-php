<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Wait until a date from the enrollment event/subscriber data, optionally offset before or after that date.
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
     * @var ?string $field Event/subscriber date field path to wait until.
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
     * @var ?string $untilDateField Alias for field.
     */
    #[JsonProperty('untilDateField')]
    public ?string $untilDateField;

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
     * @param array{
     *   days?: ?float,
     *   direction?: ?value-of<SequenceWaitUntilInputDirection>,
     *   field?: ?string,
     *   hours?: ?float,
     *   minutes?: ?float,
     *   missingAction?: ?value-of<SequenceWaitUntilInputMissingAction>,
     *   offset?: ?SequenceDelayOffsetInput,
     *   untilDateField?: ?string,
     *   untilMissingAction?: ?value-of<SequenceWaitUntilInputUntilMissingAction>,
     *   untilOffsetDirection?: ?value-of<SequenceWaitUntilInputUntilOffsetDirection>,
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
        $this->untilDateField = $values['untilDateField'] ?? null;
        $this->untilMissingAction = $values['untilMissingAction'] ?? null;
        $this->untilOffsetDirection = $values['untilOffsetDirection'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
