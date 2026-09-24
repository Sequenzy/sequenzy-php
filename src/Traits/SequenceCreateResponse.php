<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\SequenceCreateResponseEventTracking;
use Sequenzy\Types\SequenceCreateResponseSequence;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * @property ?SequenceCreateResponseEventTracking $eventTracking
 * @property ?string $eventTrackingCode
 * @property ?string $message
 * @property ?array<string> $requiredEvents
 * @property ?SequenceCreateResponseSequence $sequence
 * @property ?bool $success
 * @property ?array<string> $warnings
 */
trait SequenceCreateResponse
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
     * @var ?array<string> $warnings Non-blocking advisories about a created sequence. Besides block and sender-identity advisories, POST /sequences reports request fields that were ignored (such as a nested `triggerConfig`, `delay: 2`, `delayDays` or a body `companyId` that differs from the selected company), `contact_added` list IDs not found in the company, and a `contact_added` trigger sent with no list and no `listScope`. The sequence is still created as a draft; fix these before enabling it. Absent when there is nothing to report.
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;
}
