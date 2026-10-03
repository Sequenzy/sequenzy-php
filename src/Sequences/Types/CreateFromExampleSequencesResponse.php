<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateFromExampleSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?CreateFromExampleSequencesResponseExample $example
     */
    #[JsonProperty('example')]
    public ?CreateFromExampleSequencesResponseExample $example;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?CreateFromExampleSequencesResponseSequence $sequence
     */
    #[JsonProperty('sequence')]
    public ?CreateFromExampleSequencesResponseSequence $sequence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings Present when email writing could not be queued.
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   example?: ?CreateFromExampleSequencesResponseExample,
     *   message?: ?string,
     *   sequence?: ?CreateFromExampleSequencesResponseSequence,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->example = $values['example'] ?? null;
        $this->message = $values['message'] ?? null;
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
