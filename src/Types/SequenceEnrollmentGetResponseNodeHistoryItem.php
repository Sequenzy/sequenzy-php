<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SequenceEnrollmentGetResponseNodeHistoryItem extends JsonSerializableType
{
    /**
     * @var ?SequenceEnrollmentBranchDecision $branchDecision
     */
    #[JsonProperty('branchDecision')]
    public ?SequenceEnrollmentBranchDecision $branchDecision;

    /**
     * @var ?DateTime $eventTime
     */
    #[JsonProperty('eventTime'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $eventTime;

    /**
     * @var ?string $eventType
     */
    #[JsonProperty('eventType')]
    public ?string $eventType;

    /**
     * @var ?string $nodeId
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?string $nodeLabel
     */
    #[JsonProperty('nodeLabel')]
    public ?string $nodeLabel;

    /**
     * @var ?string $nodeType
     */
    #[JsonProperty('nodeType')]
    public ?string $nodeType;

    /**
     * @param array{
     *   branchDecision?: ?SequenceEnrollmentBranchDecision,
     *   eventTime?: ?DateTime,
     *   eventType?: ?string,
     *   nodeId?: ?string,
     *   nodeLabel?: ?string,
     *   nodeType?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->branchDecision = $values['branchDecision'] ?? null;
        $this->eventTime = $values['eventTime'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->nodeLabel = $values['nodeLabel'] ?? null;
        $this->nodeType = $values['nodeType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
