<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentRealignJobResponse extends JsonSerializableType
{
    /**
     * @var bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public bool $dryRun;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var string $jobId
     */
    #[JsonProperty('jobId')]
    public string $jobId;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?array<string, mixed> $result Completed realignment result; null while queued, running, or failed.
     */
    #[JsonProperty('result'), ArrayType(['string' => 'mixed'])]
    public ?array $result;

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
     * @var value-of<SequenceEnrollmentRealignJobResponseStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   dryRun: bool,
     *   jobId: string,
     *   message: string,
     *   sequenceId: string,
     *   status: value-of<SequenceEnrollmentRealignJobResponseStatus>,
     *   success: bool,
     *   error?: ?string,
     *   result?: ?array<string, mixed>,
     *   sequenceName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dryRun = $values['dryRun'];
        $this->error = $values['error'] ?? null;
        $this->jobId = $values['jobId'];
        $this->message = $values['message'];
        $this->result = $values['result'] ?? null;
        $this->sequenceId = $values['sequenceId'];
        $this->sequenceName = $values['sequenceName'] ?? null;
        $this->status = $values['status'];
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
