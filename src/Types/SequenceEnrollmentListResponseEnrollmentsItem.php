<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SequenceEnrollmentListResponseEnrollmentsItem extends JsonSerializableType
{
    /**
     * @var ?string $currentNodeId Sequence node this enrollment is currently sitting on.
     */
    #[JsonProperty('currentNodeId')]
    public ?string $currentNodeId;

    /**
     * @var ?string $currentNodeLabel Node label or email subject when available.
     */
    #[JsonProperty('currentNodeLabel')]
    public ?string $currentNodeLabel;

    /**
     * @var ?bool $currentNodeMissing
     */
    #[JsonProperty('currentNodeMissing')]
    public ?bool $currentNodeMissing;

    /**
     * @var ?string $currentNodeType Omitted when the node no longer exists in the sequence graph.
     */
    #[JsonProperty('currentNodeType')]
    public ?string $currentNodeType;

    /**
     * @var ?string $email Subscriber email address. Falls back to the address captured at enrollment when the subscriber record no longer exists.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $enrollmentId Enrollment token ID. Stable identifier for this one run through the sequence.
     */
    #[JsonProperty('enrollmentId')]
    public ?string $enrollmentId;

    /**
     * @var ?string $enrollmentKey
     */
    #[JsonProperty('enrollmentKey')]
    public ?string $enrollmentKey;

    /**
     * @var ?DateTime $enrollmentStartedAt
     */
    #[JsonProperty('enrollmentStartedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $enrollmentStartedAt;

    /**
     * @var ?SequenceEnrollmentListResponseEnrollmentsItemEnteredVia $enteredVia What put this contact into the sequence. The distinguishing detail when a trigger covers several lists or tags.
     */
    #[JsonProperty('enteredVia')]
    public ?SequenceEnrollmentListResponseEnrollmentsItemEnteredVia $enteredVia;

    /**
     * @var ?string $failedReason Why this enrollment stopped, for status `failed`. Null for every other status and for failures recorded before this field existed. The same reason repeated across enrollments on one `currentNodeId` points at that step rather than at the contacts.
     */
    #[JsonProperty('failedReason')]
    public ?string $failedReason;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?DateTime $lastUpdatedAt Last change to this enrollment. For a waiting enrollment this is when it arrived at its current node.
     */
    #[JsonProperty('lastUpdatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUpdatedAt;

    /**
     * @var ?DateTime $movedAt When that release happened, or null when the enrollment was never moved.
     */
    #[JsonProperty('movedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $movedAt;

    /**
     * @var ?string $movedFromNodeId Step this enrollment was released from by POST /sequences/{sequenceId}/enrollments/move, or null when it reached its current step on its own.
     */
    #[JsonProperty('movedFromNodeId')]
    public ?string $movedFromNodeId;

    /**
     * @var ?string $moveReason Note recorded with that release, or null when none was given.
     */
    #[JsonProperty('moveReason')]
    public ?string $moveReason;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?value-of<SequenceEnrollmentListResponseEnrollmentsItemStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $stopConditionMatches Whether the sequence stop condition matches for this contact right now. Null when it was not determined - stopConditionMatch was not requested, the sequence has no stop condition, this enrollment is no longer active or waiting, or it fell outside the evaluated window. Null never means "does not match". This is a non-atomic snapshot; the worker re-checks before a future step, but the condition can change and a step already past its stop check may still finish.
     */
    #[JsonProperty('stopConditionMatches')]
    public ?bool $stopConditionMatches;

    /**
     * @var ?string $stopConditionMatchReason Human-readable reason the stop condition matches. Null when stopConditionMatches is not true.
     */
    #[JsonProperty('stopConditionMatchReason')]
    public ?string $stopConditionMatchReason;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?string $subscriberStatus
     */
    #[JsonProperty('subscriberStatus')]
    public ?string $subscriberStatus;

    /**
     * @var ?DateTime $waitUntil When a waiting enrollment is scheduled to resume, or null when nothing is scheduled.
     */
    #[JsonProperty('waitUntil'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $waitUntil;

    /**
     * @param array{
     *   currentNodeId?: ?string,
     *   currentNodeLabel?: ?string,
     *   currentNodeMissing?: ?bool,
     *   currentNodeType?: ?string,
     *   email?: ?string,
     *   enrollmentId?: ?string,
     *   enrollmentKey?: ?string,
     *   enrollmentStartedAt?: ?DateTime,
     *   enteredVia?: ?SequenceEnrollmentListResponseEnrollmentsItemEnteredVia,
     *   failedReason?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   lastUpdatedAt?: ?DateTime,
     *   movedAt?: ?DateTime,
     *   movedFromNodeId?: ?string,
     *   moveReason?: ?string,
     *   sequenceId?: ?string,
     *   status?: ?value-of<SequenceEnrollmentListResponseEnrollmentsItemStatus>,
     *   stopConditionMatches?: ?bool,
     *   stopConditionMatchReason?: ?string,
     *   subscriberId?: ?string,
     *   subscriberStatus?: ?string,
     *   waitUntil?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currentNodeId = $values['currentNodeId'] ?? null;
        $this->currentNodeLabel = $values['currentNodeLabel'] ?? null;
        $this->currentNodeMissing = $values['currentNodeMissing'] ?? null;
        $this->currentNodeType = $values['currentNodeType'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->enrollmentId = $values['enrollmentId'] ?? null;
        $this->enrollmentKey = $values['enrollmentKey'] ?? null;
        $this->enrollmentStartedAt = $values['enrollmentStartedAt'] ?? null;
        $this->enteredVia = $values['enteredVia'] ?? null;
        $this->failedReason = $values['failedReason'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->lastUpdatedAt = $values['lastUpdatedAt'] ?? null;
        $this->movedAt = $values['movedAt'] ?? null;
        $this->movedFromNodeId = $values['movedFromNodeId'] ?? null;
        $this->moveReason = $values['moveReason'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->stopConditionMatches = $values['stopConditionMatches'] ?? null;
        $this->stopConditionMatchReason = $values['stopConditionMatchReason'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->subscriberStatus = $values['subscriberStatus'] ?? null;
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
