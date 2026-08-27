<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceCreateResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceCreateResponseEventTracking $eventTracking Endpoint, payload contract, example, documentation, and integration-guide pointer returned for custom event triggers.
     */
    #[JsonProperty('eventTracking')]
    public ?SequenceCreateResponseEventTracking $eventTracking;

    /**
     * @var ?string $eventTrackingCode Code snippet returned for custom event triggers.
     */
    #[JsonProperty('eventTrackingCode')]
    public ?string $eventTrackingCode;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?array<string> $requiredEvents
     */
    #[JsonProperty('requiredEvents'), ArrayType(['string'])]
    public ?array $requiredEvents;

    /**
     * @var ?SequenceCreateResponseSequence $sequence
     */
    #[JsonProperty('sequence')]
    public ?SequenceCreateResponseSequence $sequence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   eventTracking?: ?SequenceCreateResponseEventTracking,
     *   eventTrackingCode?: ?string,
     *   message?: ?string,
     *   requiredEvents?: ?array<string>,
     *   sequence?: ?SequenceCreateResponseSequence,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventTracking = $values['eventTracking'] ?? null;
        $this->eventTrackingCode = $values['eventTrackingCode'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->requiredEvents = $values['requiredEvents'] ?? null;
        $this->sequence = $values['sequence'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
