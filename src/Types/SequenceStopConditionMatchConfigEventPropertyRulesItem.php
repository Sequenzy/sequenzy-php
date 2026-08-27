<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceStopConditionMatchConfigEventPropertyRulesItem extends JsonSerializableType
{
    /**
     * @var string $entryFieldPath
     */
    #[JsonProperty('entryFieldPath')]
    public string $entryFieldPath;

    /**
     * @var string $eventFieldPath
     */
    #[JsonProperty('eventFieldPath')]
    public string $eventFieldPath;

    /**
     * @param array{
     *   entryFieldPath: string,
     *   eventFieldPath: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->entryFieldPath = $values['entryFieldPath'];
        $this->eventFieldPath = $values['eventFieldPath'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
