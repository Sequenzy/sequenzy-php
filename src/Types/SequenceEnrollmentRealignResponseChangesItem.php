<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SequenceEnrollmentRealignResponseChangesItem extends JsonSerializableType
{
    /**
     * @var ?string $currentNodeId
     */
    #[JsonProperty('currentNodeId')]
    public ?string $currentNodeId;

    /**
     * @var ?string $enrollmentId
     */
    #[JsonProperty('enrollmentId')]
    public ?string $enrollmentId;

    /**
     * @var ?float $movedEarlierMinutes
     */
    #[JsonProperty('movedEarlierMinutes')]
    public ?float $movedEarlierMinutes;

    /**
     * @var ?DateTime $newWaitUntil
     */
    #[JsonProperty('newWaitUntil'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $newWaitUntil;

    /**
     * @var ?string $subscriberEmail
     */
    #[JsonProperty('subscriberEmail')]
    public ?string $subscriberEmail;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?DateTime $waitUntil
     */
    #[JsonProperty('waitUntil'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $waitUntil;

    /**
     * @param array{
     *   currentNodeId?: ?string,
     *   enrollmentId?: ?string,
     *   movedEarlierMinutes?: ?float,
     *   newWaitUntil?: ?DateTime,
     *   subscriberEmail?: ?string,
     *   subscriberId?: ?string,
     *   waitUntil?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currentNodeId = $values['currentNodeId'] ?? null;
        $this->enrollmentId = $values['enrollmentId'] ?? null;
        $this->movedEarlierMinutes = $values['movedEarlierMinutes'] ?? null;
        $this->newWaitUntil = $values['newWaitUntil'] ?? null;
        $this->subscriberEmail = $values['subscriberEmail'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
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
