<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SequenceEnrollmentPauseItem extends JsonSerializableType
{
    /**
     * @var string $currentNodeId Step the enrollment is on. Pausing and resuming never change it.
     */
    #[JsonProperty('currentNodeId')]
    public string $currentNodeId;

    /**
     * @var string $enrollmentId
     */
    #[JsonProperty('enrollmentId')]
    public string $enrollmentId;

    /**
     * @var value-of<SequenceEnrollmentPauseItemOutcome> $outcome paused, already_paused, or in_progress (a step was running at that moment; repeat the request shortly) for pause. resumed or not_paused for resume.
     */
    #[JsonProperty('outcome')]
    public string $outcome;

    /**
     * @var ?DateTime $pausedAt When the current pause began; null unless status is paused.
     */
    #[JsonProperty('pausedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $pausedAt;

    /**
     * @var value-of<SequenceEnrollmentPauseItemStatus> $status Status after this request.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $subscriberEmail
     */
    #[JsonProperty('subscriberEmail')]
    public ?string $subscriberEmail;

    /**
     * @var string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public string $subscriberId;

    /**
     * @var ?DateTime $waitUntil When a waiting enrollment next runs its step, or null.
     */
    #[JsonProperty('waitUntil'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $waitUntil;

    /**
     * @param array{
     *   currentNodeId: string,
     *   enrollmentId: string,
     *   outcome: value-of<SequenceEnrollmentPauseItemOutcome>,
     *   status: value-of<SequenceEnrollmentPauseItemStatus>,
     *   subscriberId: string,
     *   pausedAt?: ?DateTime,
     *   subscriberEmail?: ?string,
     *   waitUntil?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currentNodeId = $values['currentNodeId'];
        $this->enrollmentId = $values['enrollmentId'];
        $this->outcome = $values['outcome'];
        $this->pausedAt = $values['pausedAt'] ?? null;
        $this->status = $values['status'];
        $this->subscriberEmail = $values['subscriberEmail'] ?? null;
        $this->subscriberId = $values['subscriberId'];
        $this->waitUntil = $values['waitUntil'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
