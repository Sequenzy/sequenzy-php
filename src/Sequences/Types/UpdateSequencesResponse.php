<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?UpdateSequencesResponseSequence $sequence
     */
    #[JsonProperty('sequence')]
    public ?UpdateSequencesResponseSequence $sequence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings Non-blocking advisories about the update. Besides block and sender advisories, this names request fields that were ignored (such as `triggerConfig` or a non-object step `delay`) and `contact_added` list IDs not found in the company, which block enabling. Absent when there is nothing to report.
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   sequence?: ?UpdateSequencesResponseSequence,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sequence = $values['sequence'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
