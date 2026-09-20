<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceAudience;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class EnrollAudienceSequencesRequest extends JsonSerializableType
{
    /**
     * @var SequenceAudience $audience
     */
    #[JsonProperty('audience')]
    public SequenceAudience $audience;

    /**
     * @var ?DateTime $scheduledFor Start the run at this moment instead of now (up to one year ahead). The run is created queued with a delayed job and can be cancelled before it starts. A past value starts now.
     */
    #[JsonProperty('scheduledFor'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledFor;

    /**
     * @var ?string $targetNodeId Step to start contacts at. Defaults to the first step after the trigger. Cannot be a trigger node.
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   audience: SequenceAudience,
     *   scheduledFor?: ?DateTime,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'];
        $this->scheduledFor = $values['scheduledFor'] ?? null;
        $this->targetNodeId = $values['targetNodeId'] ?? null;
    }
}
