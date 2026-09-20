<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

class SequenceKeyDate extends JsonSerializableType
{
    /**
     * @var DateTime $at ISO 8601 date-time. A value without a zone designator ("2026-11-27T00:00") is read as wall-clock time in the key dates timezone. Stored and returned normalized to UTC.
     */
    #[JsonProperty('at'), Date(Date::TYPE_DATETIME)]
    public DateTime $at;

    /**
     * @var ?string $key Stable identifier referenced by waitUntilKeyDate.key (lowercase letters, digits, underscores). Defaults to a slug of the label.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var string $label Human label shown in the builder.
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @param array{
     *   at: DateTime,
     *   label: string,
     *   key?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->at = $values['at'];
        $this->key = $values['key'] ?? null;
        $this->label = $values['label'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
