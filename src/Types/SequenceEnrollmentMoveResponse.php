<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentMoveResponse extends JsonSerializableType
{
    /**
     * @var ?float $dailyLimit
     */
    #[JsonProperty('dailyLimit')]
    public ?float $dailyLimit;

    /**
     * @var ?float $dailyRemaining
     */
    #[JsonProperty('dailyRemaining')]
    public ?float $dailyRemaining;

    /**
     * @var ?bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?float $effectiveLimit How many this call was allowed to move after the daily guardrail was applied.
     */
    #[JsonProperty('effectiveLimit')]
    public ?float $effectiveLimit;

    /**
     * @var ?float $enqueuedCount Moved enrollments handed to the worker queue. Zero while the sequence is not running.
     */
    #[JsonProperty('enqueuedCount')]
    public ?float $enqueuedCount;

    /**
     * @var ?array<SequenceEnrollmentMoveResponseEnqueueErrorsItem> $enqueueErrors
     */
    #[JsonProperty('enqueueErrors'), ArrayType([SequenceEnrollmentMoveResponseEnqueueErrorsItem::class])]
    public ?array $enqueueErrors;

    /**
     * @var ?array<SequenceEnrollmentMoveResponseEnrollmentsItem> $enrollments
     */
    #[JsonProperty('enrollments'), ArrayType([SequenceEnrollmentMoveResponseEnrollmentsItem::class])]
    public ?array $enrollments;

    /**
     * @var ?string $fromNodeId
     */
    #[JsonProperty('fromNodeId')]
    public ?string $fromNodeId;

    /**
     * @var ?bool $hasMore
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?float $matchedCount Movable enrollments parked on fromNodeId when the request started.
     */
    #[JsonProperty('matchedCount')]
    public ?float $matchedCount;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?float $movedCount
     */
    #[JsonProperty('movedCount')]
    public ?float $movedCount;

    /**
     * @var ?float $movedInWindow Moves onto targetNodeId already recorded in the rolling 24-hour window.
     */
    #[JsonProperty('movedInWindow')]
    public ?float $movedInWindow;

    /**
     * @var ?float $remainingCount Movable enrollments still on fromNodeId. Repeat the same request while this is above zero.
     */
    #[JsonProperty('remainingCount')]
    public ?float $remainingCount;

    /**
     * @var ?float $requestedLimit
     */
    #[JsonProperty('requestedLimit')]
    public ?float $requestedLimit;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?float $skippedCount Enrollments excluded because they are active, a worker is mid-step on them, or they are parked awaiting double opt-in. Only safely parked waiting tokens can be moved.
     */
    #[JsonProperty('skippedCount')]
    public ?float $skippedCount;

    /**
     * @var ?string $sort
     */
    #[JsonProperty('sort')]
    public ?string $sort;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string, mixed> $tagResult
     */
    #[JsonProperty('tagResult'), ArrayType(['string' => 'mixed'])]
    public ?array $tagResult;

    /**
     * @var ?string $targetNodeId
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   dailyLimit?: ?float,
     *   dailyRemaining?: ?float,
     *   dryRun?: ?bool,
     *   effectiveLimit?: ?float,
     *   enqueuedCount?: ?float,
     *   enqueueErrors?: ?array<SequenceEnrollmentMoveResponseEnqueueErrorsItem>,
     *   enrollments?: ?array<SequenceEnrollmentMoveResponseEnrollmentsItem>,
     *   fromNodeId?: ?string,
     *   hasMore?: ?bool,
     *   matchedCount?: ?float,
     *   message?: ?string,
     *   movedCount?: ?float,
     *   movedInWindow?: ?float,
     *   remainingCount?: ?float,
     *   requestedLimit?: ?float,
     *   sequenceId?: ?string,
     *   skippedCount?: ?float,
     *   sort?: ?string,
     *   success?: ?bool,
     *   tagResult?: ?array<string, mixed>,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dailyLimit = $values['dailyLimit'] ?? null;
        $this->dailyRemaining = $values['dailyRemaining'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->effectiveLimit = $values['effectiveLimit'] ?? null;
        $this->enqueuedCount = $values['enqueuedCount'] ?? null;
        $this->enqueueErrors = $values['enqueueErrors'] ?? null;
        $this->enrollments = $values['enrollments'] ?? null;
        $this->fromNodeId = $values['fromNodeId'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
        $this->matchedCount = $values['matchedCount'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->movedCount = $values['movedCount'] ?? null;
        $this->movedInWindow = $values['movedInWindow'] ?? null;
        $this->remainingCount = $values['remainingCount'] ?? null;
        $this->requestedLimit = $values['requestedLimit'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->skippedCount = $values['skippedCount'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tagResult = $values['tagResult'] ?? null;
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
