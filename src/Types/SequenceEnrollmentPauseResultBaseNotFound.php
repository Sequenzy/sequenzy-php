<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentPauseResultBaseNotFound extends JsonSerializableType
{
    /**
     * @var ?array<string> $emails
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public ?array $emails;

    /**
     * @var ?array<string> $subscriberIds
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   emails?: ?array<string>,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
