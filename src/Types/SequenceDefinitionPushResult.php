<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionPushResult extends JsonSerializableType
{
    /**
     * @var ?SequenceDefinitionPushResultChanges $changes
     */
    #[JsonProperty('changes')]
    public ?SequenceDefinitionPushResultChanges $changes;

    /**
     * @var ?bool $created
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?bool $hasChanges
     */
    #[JsonProperty('hasChanges')]
    public ?bool $hasChanges;

    /**
     * @var ?SequenceDefinitionPushResultSequence $sequence
     */
    #[JsonProperty('sequence')]
    public ?SequenceDefinitionPushResultSequence $sequence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   changes?: ?SequenceDefinitionPushResultChanges,
     *   created?: ?bool,
     *   dryRun?: ?bool,
     *   error?: ?string,
     *   hasChanges?: ?bool,
     *   sequence?: ?SequenceDefinitionPushResultSequence,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->changes = $values['changes'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->hasChanges = $values['hasChanges'] ?? null;
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
