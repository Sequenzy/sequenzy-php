<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentRealignQueuedResponse extends JsonSerializableType
{
    /**
     * @var bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public bool $dryRun;

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
     * @var value-of<SequenceEnrollmentRealignQueuedResponseStatus> $status
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
     *   status: value-of<SequenceEnrollmentRealignQueuedResponseStatus>,
     *   success: bool,
     *   sequenceName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dryRun = $values['dryRun'];
        $this->jobId = $values['jobId'];
        $this->message = $values['message'];
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
