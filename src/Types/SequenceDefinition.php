<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * A whole sequence as one document, addressed by keys you choose. In the readable format (no `connections`), `trigger` starts the sequence and `steps` run in order, with branch and split paths nesting their own steps and an implicit end. In the explicit format, every step has a `type` and `config` and `connections` wire them. On PUT, omitted settings keep their stored values while the steps replace the stored graph.
 */
class SequenceDefinition extends JsonSerializableType
{
    /**
     * @var ?array<SequenceDefinitionConnection> $connections Explicit format only. Leave it out to use the readable format.
     */
    #[JsonProperty('connections'), ArrayType([SequenceDefinitionConnection::class])]
    public ?array $connections;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $id Read-only sequence ID. On PUT, adopts that existing sequence when it has no key yet.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $key Your key for the sequence. Optional on PUT (the URL key is used); must match the URL when present. Empty on GET for a sequence that has no key yet.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?value-of<SequenceDefinitionManagedBy> $managedBy `code` makes steps and settings read-only in the dashboard while on/off, pause and test sends stay available. New sequences default to `code`; existing ones keep their value when omitted. Marketer personal keys cannot change it on an existing sequence. Not returned on GET, so a pulled document pushed back never changes it.
     */
    #[JsonProperty('managedBy')]
    public ?string $managedBy;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?SequenceDefinitionSettings $settings
     */
    #[JsonProperty('settings')]
    public ?SequenceDefinitionSettings $settings;

    /**
     * @var ?string $status Informational. Pushes accept and ignore it, and never change status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var array<SequenceDefinitionStep> $steps
     */
    #[JsonProperty('steps'), ArrayType([SequenceDefinitionStep::class])]
    public array $steps;

    /**
     * @var ?SequenceDefinitionTrigger $trigger Readable format only, and required there. Use one of event (with optional where property filters), tag, list, segment, manual: true, or type and config.
     */
    #[JsonProperty('trigger')]
    public ?SequenceDefinitionTrigger $trigger;

    /**
     * @param array{
     *   name: string,
     *   steps: array<SequenceDefinitionStep>,
     *   connections?: ?array<SequenceDefinitionConnection>,
     *   description?: ?string,
     *   id?: ?string,
     *   key?: ?string,
     *   managedBy?: ?value-of<SequenceDefinitionManagedBy>,
     *   settings?: ?SequenceDefinitionSettings,
     *   status?: ?string,
     *   trigger?: ?SequenceDefinitionTrigger,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->connections = $values['connections'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->managedBy = $values['managedBy'] ?? null;
        $this->name = $values['name'];
        $this->settings = $values['settings'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->steps = $values['steps'];
        $this->trigger = $values['trigger'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
