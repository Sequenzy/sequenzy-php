<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SimulateSequencesResponse extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $enrollment Who currently matches and the confirmation that nobody is auto-enrolled on activate.
     */
    #[JsonProperty('enrollment'), ArrayType(['string' => 'mixed'])]
    public array $enrollment;

    /**
     * @var ?array<string, mixed> $path Walked graph for the optional stored subscriber. emailStepsOnPath counts traversed email nodes; emailsOnPath counts those deliverable for the subscriber's current email and status. Null when none was passed.
     */
    #[JsonProperty('path'), ArrayType(['string' => 'mixed'])]
    public ?array $path;

    /**
     * @var SimulateSequencesResponseReadiness $readiness Activation blockers and warnings.
     */
    #[JsonProperty('readiness')]
    public SimulateSequencesResponseReadiness $readiness;

    /**
     * @var bool $sendsMail
     */
    #[JsonProperty('sendsMail')]
    public bool $sendsMail;

    /**
     * @var string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public string $sequenceId;

    /**
     * @var ?string $sequenceName
     */
    #[JsonProperty('sequenceName')]
    public ?string $sequenceName;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   enrollment: array<string, mixed>,
     *   readiness: SimulateSequencesResponseReadiness,
     *   sendsMail: bool,
     *   sequenceId: string,
     *   success: bool,
     *   path?: ?array<string, mixed>,
     *   sequenceName?: ?string,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enrollment = $values['enrollment'];
        $this->path = $values['path'] ?? null;
        $this->readiness = $values['readiness'];
        $this->sendsMail = $values['sendsMail'];
        $this->sequenceId = $values['sequenceId'];
        $this->sequenceName = $values['sequenceName'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
