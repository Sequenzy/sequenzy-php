<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class SequenceTestRunResponseRun extends JsonSerializableType
{
    /**
     * @var string $automationId Sequence ID.
     */
    #[JsonProperty('automationId')]
    public string $automationId;

    /**
     * @var string $companyId
     */
    #[JsonProperty('companyId')]
    public string $companyId;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?string $errorMessage
     */
    #[JsonProperty('errorMessage')]
    public ?string $errorMessage;

    /**
     * @var ?DateTime $finishedAt
     */
    #[JsonProperty('finishedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $finishedAt;

    /**
     * @var string $id Test run ID.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $initiatedByUserId
     */
    #[JsonProperty('initiatedByUserId')]
    public ?string $initiatedByUserId;

    /**
     * @var ?string $jobId Queue job ID on creation only. Empty if unavailable.
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var array<string> $recipientEmails
     */
    #[JsonProperty('recipientEmails'), ArrayType(['string'])]
    public array $recipientEmails;

    /**
     * @var int $speedMultiplier
     */
    #[JsonProperty('speedMultiplier')]
    public int $speedMultiplier;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var value-of<SequenceTestRunResponseRunStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var array<array<string, mixed>> $steps Step execution logs including nodeId, status, message, timing and action-specific metadata when available.
     */
    #[JsonProperty('steps'), ArrayType([['string' => 'mixed']])]
    public array $steps;

    /**
     * @var ?string $subscriberId Subscriber ID, or null on historical runs.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   automationId: string,
     *   companyId: string,
     *   createdAt: DateTime,
     *   id: string,
     *   recipientEmails: array<string>,
     *   speedMultiplier: int,
     *   status: value-of<SequenceTestRunResponseRunStatus>,
     *   steps: array<array<string, mixed>>,
     *   updatedAt: DateTime,
     *   errorMessage?: ?string,
     *   finishedAt?: ?DateTime,
     *   initiatedByUserId?: ?string,
     *   jobId?: ?string,
     *   startedAt?: ?DateTime,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->automationId = $values['automationId'];
        $this->companyId = $values['companyId'];
        $this->createdAt = $values['createdAt'];
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->finishedAt = $values['finishedAt'] ?? null;
        $this->id = $values['id'];
        $this->initiatedByUserId = $values['initiatedByUserId'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->recipientEmails = $values['recipientEmails'];
        $this->speedMultiplier = $values['speedMultiplier'];
        $this->startedAt = $values['startedAt'] ?? null;
        $this->status = $values['status'];
        $this->steps = $values['steps'];
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
