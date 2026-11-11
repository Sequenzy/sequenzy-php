<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceTriggersSkippedReason;
use Sequenzy\Core\Types\ArrayType;

class CreateSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?CreateSubscribersResponseOptIn $optIn Present when the subscriber is awaiting double opt-in confirmation.
     */
    #[JsonProperty('optIn')]
    public ?CreateSubscribersResponseOptIn $optIn;

    /**
     * @var ?bool $sequenceTriggersRan
     */
    #[JsonProperty('sequenceTriggersRan')]
    public ?bool $sequenceTriggersRan;

    /**
     * @var ?value-of<SequenceTriggersSkippedReason> $sequenceTriggersSkippedReason
     */
    #[JsonProperty('sequenceTriggersSkippedReason')]
    public ?string $sequenceTriggersSkippedReason;

    /**
     * @var ?CreateSubscribersResponseSubscriber $subscriber
     */
    #[JsonProperty('subscriber')]
    public ?CreateSubscribersResponseSubscriber $subscriber;

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
     *   optIn?: ?CreateSubscribersResponseOptIn,
     *   sequenceTriggersRan?: ?bool,
     *   sequenceTriggersSkippedReason?: ?value-of<SequenceTriggersSkippedReason>,
     *   subscriber?: ?CreateSubscribersResponseSubscriber,
     *   success?: ?bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->optIn = $values['optIn'] ?? null;
        $this->sequenceTriggersRan = $values['sequenceTriggersRan'] ?? null;
        $this->sequenceTriggersSkippedReason = $values['sequenceTriggersSkippedReason'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
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
