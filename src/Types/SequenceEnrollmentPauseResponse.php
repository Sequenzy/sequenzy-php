<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\SequenceEnrollmentPauseResultBase;
use Sequenzy\Core\Json\JsonProperty;

class SequenceEnrollmentPauseResponse extends JsonSerializableType
{
    use SequenceEnrollmentPauseResultBase;

    /**
     * @var int $alreadyPausedCount Enrollments that were already paused and were left as they were.
     */
    #[JsonProperty('alreadyPausedCount')]
    public int $alreadyPausedCount;

    /**
     * @var int $inProgressCount Enrollments not paused because their current step was running. Repeat the request shortly.
     */
    #[JsonProperty('inProgressCount')]
    public int $inProgressCount;

    /**
     * @var int $pausedCount Enrollments paused by this request.
     */
    #[JsonProperty('pausedCount')]
    public int $pausedCount;

    /**
     * @param array{
     *   enrollments: array<SequenceEnrollmentPauseItem>,
     *   message: string,
     *   notEnrolled: array<SequenceEnrollmentPauseResultBaseNotEnrolledItem>,
     *   notFound: SequenceEnrollmentPauseResultBaseNotFound,
     *   sequenceId: string,
     *   success: bool,
     *   alreadyPausedCount: int,
     *   inProgressCount: int,
     *   pausedCount: int,
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
        $this->alreadyPausedCount = $values['alreadyPausedCount'];
        $this->inProgressCount = $values['inProgressCount'];
        $this->pausedCount = $values['pausedCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
