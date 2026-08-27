<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EnrollSubscribersInSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $emails Subscriber emails to enroll. Combined with subscriberIds, up to 500 per request.
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public ?array $emails;

    /**
     * @var ?array<string> $subscriberIds Subscriber IDs to enroll. Combined with emails, up to 500 per request.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @var ?string $targetNodeId Node to start enrollment at. Defaults to the first step after the trigger. Cannot be a trigger node.
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   emails?: ?array<string>,
     *   subscriberIds?: ?array<string>,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
        $this->targetNodeId = $values['targetNodeId'] ?? null;
    }
}
