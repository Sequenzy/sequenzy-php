<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentPauseResultBase extends JsonSerializableType
{
    /**
     * @var array<SequenceEnrollmentPauseItem> $enrollments Every active, waiting, or paused enrollment of the targeted contacts in this sequence, with its outcome.
     */
    #[JsonProperty('enrollments'), ArrayType([SequenceEnrollmentPauseItem::class])]
    public array $enrollments;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var array<SequenceEnrollmentPauseResultBaseNotEnrolledItem> $notEnrolled Targeted contacts that exist but have no active, waiting, or paused enrollment in this sequence.
     */
    #[JsonProperty('notEnrolled'), ArrayType([SequenceEnrollmentPauseResultBaseNotEnrolledItem::class])]
    public array $notEnrolled;

    /**
     * @var SequenceEnrollmentPauseResultBaseNotFound $notFound
     */
    #[JsonProperty('notFound')]
    public SequenceEnrollmentPauseResultBaseNotFound $notFound;

    /**
     * @var string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public string $sequenceId;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   enrollments: array<SequenceEnrollmentPauseItem>,
     *   message: string,
     *   notEnrolled: array<SequenceEnrollmentPauseResultBaseNotEnrolledItem>,
     *   notFound: SequenceEnrollmentPauseResultBaseNotFound,
     *   sequenceId: string,
     *   success: bool,
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
