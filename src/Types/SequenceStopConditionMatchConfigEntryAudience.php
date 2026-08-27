<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceStopConditionMatchConfigEntryAudience extends JsonSerializableType
{
    /**
     * @var value-of<SequenceStopConditionMatchConfigEntryAudienceAudience> $audience Use the tag or list recorded when this contact enrolled.
     */
    #[JsonProperty('audience')]
    public string $audience;

    /**
     * @param array{
     *   audience: value-of<SequenceStopConditionMatchConfigEntryAudienceAudience>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
