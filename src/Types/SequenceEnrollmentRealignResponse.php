<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentRealignResponse extends JsonSerializableType
{
    /**
     * @var ?array<SequenceEnrollmentRealignResponseChangesItem> $changes Sample of up to 50 realigned enrollments.
     */
    #[JsonProperty('changes'), ArrayType([SequenceEnrollmentRealignResponseChangesItem::class])]
    public ?array $changes;

    /**
     * @var ?bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?bool $hasMore True when a per-request cap stopped the scan early. Continue with nextCursor while this is true.
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?float $maxRealignmentsPerRequest
     */
    #[JsonProperty('maxRealignmentsPerRequest')]
    public ?float $maxRealignmentsPerRequest;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $nextCursor Opaque continuation cursor to pass as cursor on the next request when hasMore is true.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ?float $realignedCount Waiting enrollments moved earlier, or that would move on a dry run. Capped at 1000 per request.
     */
    #[JsonProperty('realignedCount')]
    public ?float $realignedCount;

    /**
     * @var ?float $requeueFailedCount Enrollments whose new wait time was stored but whose wake-up could not be re-queued. The stuck-enrollment sweeper recovers these within a few minutes.
     */
    #[JsonProperty('requeueFailedCount')]
    public ?float $requeueFailedCount;

    /**
     * @var ?float $scannedCount Waiting enrollments inspected by this request.
     */
    #[JsonProperty('scannedCount')]
    public ?float $scannedCount;

    /**
     * @var ?array<string, mixed> $sendingWindow The sequence sending window realignment anchored on, or null when only per-step weekday gates applied.
     */
    #[JsonProperty('sendingWindow'), ArrayType(['string' => 'mixed'])]
    public ?array $sendingWindow;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?string $sequenceName
     */
    #[JsonProperty('sequenceName')]
    public ?string $sequenceName;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?float $unchangedCount
     */
    #[JsonProperty('unchangedCount')]
    public ?float $unchangedCount;

    /**
     * @var ?array<string, float> $unchangedReasons Counts per reason an enrollment did not move: already_at_window_start, already_due, day_not_allowed, no_shared_opening, no_window, not_email_bound, send_retry, raced.
     */
    #[JsonProperty('unchangedReasons'), ArrayType(['string' => 'float'])]
    public ?array $unchangedReasons;

    /**
     * @param array{
     *   changes?: ?array<SequenceEnrollmentRealignResponseChangesItem>,
     *   dryRun?: ?bool,
     *   hasMore?: ?bool,
     *   maxRealignmentsPerRequest?: ?float,
     *   message?: ?string,
     *   nextCursor?: ?string,
     *   realignedCount?: ?float,
     *   requeueFailedCount?: ?float,
     *   scannedCount?: ?float,
     *   sendingWindow?: ?array<string, mixed>,
     *   sequenceId?: ?string,
     *   sequenceName?: ?string,
     *   success?: ?bool,
     *   unchangedCount?: ?float,
     *   unchangedReasons?: ?array<string, float>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->changes = $values['changes'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
        $this->maxRealignmentsPerRequest = $values['maxRealignmentsPerRequest'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->realignedCount = $values['realignedCount'] ?? null;
        $this->requeueFailedCount = $values['requeueFailedCount'] ?? null;
        $this->scannedCount = $values['scannedCount'] ?? null;
        $this->sendingWindow = $values['sendingWindow'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->sequenceName = $values['sequenceName'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->unchangedCount = $values['unchangedCount'] ?? null;
        $this->unchangedReasons = $values['unchangedReasons'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
