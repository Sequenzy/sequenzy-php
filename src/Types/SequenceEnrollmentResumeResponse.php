<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SequenceEnrollmentPauseResultBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentResumeResponse extends JsonSerializableType
{
    use SequenceEnrollmentPauseResultBase;

    /**
     * @var int $enqueuedCount Resumed enrollments handed to the sending queue. Zero while the sequence is not running.
     */
    #[JsonProperty('enqueuedCount')]
    public int $enqueuedCount;

    /**
     * @var array<SequenceEnrollmentResumeResponseEnqueueErrorsItem> $enqueueErrors Resumed enrollments whose queue handoff failed. They stay resumed and are picked up by the stuck-enrollment sweeper.
     */
    #[JsonProperty('enqueueErrors'), ArrayType([SequenceEnrollmentResumeResponseEnqueueErrorsItem::class])]
    public array $enqueueErrors;

    /**
     * @var int $notPausedCount Enrollments of the targeted contacts that were not paused.
     */
    #[JsonProperty('notPausedCount')]
    public int $notPausedCount;

    /**
     * @var int $resumedCount Enrollments resumed by this request.
     */
    #[JsonProperty('resumedCount')]
    public int $resumedCount;

    /**
     * @var bool $sequenceRunning False when the sequence itself is disabled or not live; resumed contacts continue once it is enabled.
     */
    #[JsonProperty('sequenceRunning')]
    public bool $sequenceRunning;

    /**
     * @param array{
     *   enrollments: array<SequenceEnrollmentPauseItem>,
     *   message: string,
     *   notEnrolled: array<SequenceEnrollmentPauseResultBaseNotEnrolledItem>,
     *   notFound: SequenceEnrollmentPauseResultBaseNotFound,
     *   sequenceId: string,
     *   success: bool,
     *   enqueuedCount: int,
     *   enqueueErrors: array<SequenceEnrollmentResumeResponseEnqueueErrorsItem>,
     *   notPausedCount: int,
     *   resumedCount: int,
     *   sequenceRunning: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enrollments = $values['enrollments'];
        $this->message = $values['message'];
        $this->notEnrolled = $values['notEnrolled'];
        $this->notFound = $values['notFound'];
        $this->sequenceId = $values['sequenceId'];
        $this->success = $values['success'];
        $this->enqueuedCount = $values['enqueuedCount'];
        $this->enqueueErrors = $values['enqueueErrors'];
        $this->notPausedCount = $values['notPausedCount'];
        $this->resumedCount = $values['resumedCount'];
        $this->sequenceRunning = $values['sequenceRunning'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
