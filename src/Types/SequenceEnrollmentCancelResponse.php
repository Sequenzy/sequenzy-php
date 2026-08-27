<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentCancelResponse extends JsonSerializableType
{
    /**
     * @var ?float $cancelledCount Enrollments cancelled by this request. Bulk cancellation is capped at 1000 per request.
     */
    #[JsonProperty('cancelledCount')]
    public ?float $cancelledCount;

    /**
     * @var ?bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?array<SequenceEnrollmentCancelResponseEnrollmentsItem> $enrollments
     */
    #[JsonProperty('enrollments'), ArrayType([SequenceEnrollmentCancelResponseEnrollmentsItem::class])]
    public ?array $enrollments;

    /**
     * @var ?bool $hasMore
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?float $matchedCount Active or waiting enrollments matching the target when the request started.
     */
    #[JsonProperty('matchedCount')]
    public ?float $matchedCount;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?float $remainingCount Enrollments still matching the target after this request. Repeat the same request while this is above zero.
     */
    #[JsonProperty('remainingCount')]
    public ?float $remainingCount;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string, mixed> $target
     */
    #[JsonProperty('target'), ArrayType(['string' => 'mixed'])]
    public ?array $target;

    /**
     * @param array{
     *   cancelledCount?: ?float,
     *   dryRun?: ?bool,
     *   enrollments?: ?array<SequenceEnrollmentCancelResponseEnrollmentsItem>,
     *   hasMore?: ?bool,
     *   matchedCount?: ?float,
     *   message?: ?string,
     *   remainingCount?: ?float,
     *   sequenceId?: ?string,
     *   success?: ?bool,
     *   target?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cancelledCount = $values['cancelledCount'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->enrollments = $values['enrollments'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
        $this->matchedCount = $values['matchedCount'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->remainingCount = $values['remainingCount'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->target = $values['target'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
