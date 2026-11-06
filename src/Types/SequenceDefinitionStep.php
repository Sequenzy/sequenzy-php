<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * A readable step has a key and one of wait, email, branch (with else), split, continueIf, tag, untag, end or type. An explicit step has a type and a config.
 */
class SequenceDefinitionStep extends JsonSerializableType
{
    /**
     * @var ?array<SequenceDefinitionPath> $branch Readable format. Paths checked in order; the first match wins.
     */
    #[JsonProperty('branch'), ArrayType([SequenceDefinitionPath::class])]
    public ?array $branch;

    /**
     * @var ?array<string, mixed> $config The step's node config. Unknown fields are ignored with a warning; invalid values are rejected. emailId and the legacy trigger active flag are managed by Sequenzy. Webhook header values read as [REDACTED] and keep their stored value when pushed back unchanged.
     */
    #[JsonProperty('config'), ArrayType(['string' => 'mixed'])]
    public ?array $config;

    /**
     * @var ?array<string, mixed> $continueIf
     */
    #[JsonProperty('continueIf'), ArrayType(['string' => 'mixed'])]
    public ?array $continueIf;

    /**
     * @var ?array<SequenceDefinitionStep> $else Readable format. Required with branch; [] continues straight on.
     */
    #[JsonProperty('else'), ArrayType([SequenceDefinitionStep::class])]
    public ?array $else;

    /**
     * @var ?SequenceDefinitionStepEmail $email Email steps only. Required for a new email step, with a subject or a template; omit to keep the stored content.
     */
    #[JsonProperty('email')]
    public ?SequenceDefinitionStepEmail $email;

    /**
     * @var ?bool $end Readable format. true ends the sequence at this step.
     */
    #[JsonProperty('end')]
    public ?bool $end;

    /**
     * @var string $key Unique within the sequence. Steps without a key get one based on their content on GET, which a push saves on the existing step.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?string $label Readable format. Shown on the step in the dashboard.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $next Readable format. The key of the step that follows, instead of the next listed step.
     */
    #[JsonProperty('next')]
    public ?string $next;

    /**
     * @var ?array<SequenceDefinitionPath> $split Readable format. Random paths, each with a percent.
     */
    #[JsonProperty('split'), ArrayType([SequenceDefinitionPath::class])]
    public ?array $split;

    /**
     * @var ?string $tag Readable format. Adds this tag.
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?string $type Node type, for example trigger_event, logic_delay, action_email, logic_branch, or action_webhook with config.isEndNode true for the end. The type of an existing key cannot change, except between trigger types.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $untag Readable format. Removes this tag.
     */
    #[JsonProperty('untag')]
    public ?string $untag;

    /**
     * @var ?string $wait Readable format. A duration such as 1d, 2h 30m or 1w.
     */
    #[JsonProperty('wait')]
    public ?string $wait;

    /**
     * @param array{
     *   key: string,
     *   branch?: ?array<SequenceDefinitionPath>,
     *   config?: ?array<string, mixed>,
     *   continueIf?: ?array<string, mixed>,
     *   else?: ?array<SequenceDefinitionStep>,
     *   email?: ?SequenceDefinitionStepEmail,
     *   end?: ?bool,
     *   label?: ?string,
     *   next?: ?string,
     *   split?: ?array<SequenceDefinitionPath>,
     *   tag?: ?string,
     *   type?: ?string,
     *   untag?: ?string,
     *   wait?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->branch = $values['branch'] ?? null;
        $this->config = $values['config'] ?? null;
        $this->continueIf = $values['continueIf'] ?? null;
        $this->else = $values['else'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->key = $values['key'];
        $this->label = $values['label'] ?? null;
        $this->next = $values['next'] ?? null;
        $this->split = $values['split'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->untag = $values['untag'] ?? null;
        $this->wait = $values['wait'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
