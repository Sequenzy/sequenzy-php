<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * How sends timed from these moments are spread out, so a whole audience is not emailed in the same second. Each contact gets their own stable send time within the spread, after the moment for steps at or after it and in the hours leading up to the step's time for steps timed before it, so a "1 hour before Black Friday ends" email never lands after the sale ended. Omit it on update to keep the current spread, and send null to reset it to the default. Responses always include the effective value.
 */
class SequenceKeyDatesSendWindow extends JsonSerializableType
{
    /**
     * @var ?float $spreadOverHours Spread each email over this many hours. 0 sends everyone at the exact time.
     */
    #[JsonProperty('spreadOverHours')]
    public ?float $spreadOverHours;

    /**
     * @param array{
     *   spreadOverHours?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->spreadOverHours = $values['spreadOverHours'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
