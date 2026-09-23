<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * One background audience enrollment run.
 */
class SequenceAudienceEnrollment extends JsonSerializableType
{
    /**
     * @var ?SequenceAudience $audience
     */
    #[JsonProperty('audience')]
    public ?SequenceAudience $audience;

    /**
     * @var ?DateTime $cancelRequestedAt
     */
    #[JsonProperty('cancelRequestedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $cancelRequestedAt;

    /**
     * @var ?DateTime $completedAt
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<string, mixed> $data Run-level data passed when the run was started, read by the run's emails as `{{enrollment.<field>}}`. Null when none was given.
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @var ?int $enrolledCount
     */
    #[JsonProperty('enrolledCount')]
    public ?int $enrolledCount;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?int $estimatedCount Audience size estimated when the run started.
     */
    #[JsonProperty('estimatedCount')]
    public ?int $estimatedCount;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $processedCount Subscribers scanned so far.
     */
    #[JsonProperty('processedCount')]
    public ?int $processedCount;

    /**
     * @var ?DateTime $scheduledFor Delayed start. While set and in the future the run stays queued; cancel it before then to prevent the enrollment.
     */
    #[JsonProperty('scheduledFor'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledFor;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?int $skippedCount Matching contacts skipped because they were already in the sequence (or, for one_time sequences, finished it before).
     */
    #[JsonProperty('skippedCount')]
    public ?int $skippedCount;

    /**
     * @var ?string $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?value-of<SequenceAudienceEnrollmentStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $targetNodeId Step contacts start at.
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   audience?: ?SequenceAudience,
     *   cancelRequestedAt?: ?DateTime,
     *   completedAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   data?: ?array<string, mixed>,
     *   enrolledCount?: ?int,
     *   error?: ?string,
     *   estimatedCount?: ?int,
     *   id?: ?string,
     *   processedCount?: ?int,
     *   scheduledFor?: ?DateTime,
     *   sequenceId?: ?string,
     *   skippedCount?: ?int,
     *   source?: ?string,
     *   startedAt?: ?DateTime,
     *   status?: ?value-of<SequenceAudienceEnrollmentStatus>,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audience = $values['audience'] ?? null;
        $this->cancelRequestedAt = $values['cancelRequestedAt'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->enrolledCount = $values['enrolledCount'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->estimatedCount = $values['estimatedCount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->processedCount = $values['processedCount'] ?? null;
        $this->scheduledFor = $values['scheduledFor'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->skippedCount = $values['skippedCount'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->targetNodeId = $values['targetNodeId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
