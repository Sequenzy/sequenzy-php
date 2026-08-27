<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Activation blockers and warnings.
 */
class SimulateSequencesResponseReadiness extends JsonSerializableType
{
    /**
     * @var ?array<string> $errors
     */
    #[JsonProperty('errors'), ArrayType(['string'])]
    public ?array $errors;

    /**
     * @var ?bool $ready
     */
    #[JsonProperty('ready')]
    public ?bool $ready;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   errors?: ?array<string>,
     *   ready?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->ready = $values['ready'] ?? null;
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
