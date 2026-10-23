<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\SequenceEnrollmentPauseItem;
use Sequenzy\Types\SequenceEnrollmentPauseResultBaseNotEnrolledItem;
use Sequenzy\Types\SequenceEnrollmentPauseResultBaseNotFound;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property array<SequenceEnrollmentPauseItem> $enrollments
 * @property string $message
 * @property array<SequenceEnrollmentPauseResultBaseNotEnrolledItem> $notEnrolled
 * @property SequenceEnrollmentPauseResultBaseNotFound $notFound
 * @property string $sequenceId
 * @property bool $success
 */
trait SequenceEnrollmentPauseResultBase
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
}
