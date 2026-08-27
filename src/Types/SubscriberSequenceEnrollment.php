<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SubscriberSequenceEnrollment extends JsonSerializableType
{
    /**
     * @var ?string $currentNodeId
     */
    #[JsonProperty('currentNodeId')]
    public ?string $currentNodeId;

    /**
     * @var ?string $currentNodeLabel
     */
    #[JsonProperty('currentNodeLabel')]
    public ?string $currentNodeLabel;

    /**
     * @var ?string $currentNodeType
     */
    #[JsonProperty('currentNodeType')]
    public ?string $currentNodeType;

    /**
     * @var ?string $enrollmentStatus
     */
    #[JsonProperty('enrollmentStatus')]
    public ?string $enrollmentStatus;

    /**
     * @var ?DateTime $enteredAt
     */
    #[JsonProperty('enteredAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $enteredAt;

    /**
     * @var ?DateTime $scheduledFor
     */
    #[JsonProperty('scheduledFor'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledFor;

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
     * @var ?string $sequenceStatus
     */
    #[JsonProperty('sequenceStatus')]
    public ?string $sequenceStatus;

    /**
     * @var ?string $tokenId
     */
    #[JsonProperty('tokenId')]
    public ?string $tokenId;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   currentNodeId?: ?string,
     *   currentNodeLabel?: ?string,
     *   currentNodeType?: ?string,
     *   enrollmentStatus?: ?string,
     *   enteredAt?: ?DateTime,
     *   scheduledFor?: ?DateTime,
     *   sequenceId?: ?string,
     *   sequenceName?: ?string,
     *   sequenceStatus?: ?string,
     *   tokenId?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currentNodeId = $values['currentNodeId'] ?? null;
        $this->currentNodeLabel = $values['currentNodeLabel'] ?? null;
        $this->currentNodeType = $values['currentNodeType'] ?? null;
        $this->enrollmentStatus = $values['enrollmentStatus'] ?? null;
        $this->enteredAt = $values['enteredAt'] ?? null;
        $this->scheduledFor = $values['scheduledFor'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->sequenceName = $values['sequenceName'] ?? null;
        $this->sequenceStatus = $values['sequenceStatus'] ?? null;
        $this->tokenId = $values['tokenId'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
