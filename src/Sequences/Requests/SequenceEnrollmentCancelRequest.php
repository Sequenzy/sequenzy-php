<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentCancelRequest extends JsonSerializableType
{
    /**
     * @var ?bool $cancelAll Cancel every active or waiting enrollment in the sequence, regardless of how contacts entered it. Use this when segment-triggered enrollments share no entry field value. Defaults to dry run unless dryRun is explicitly false.
     */
    #[JsonProperty('cancelAll')]
    public ?bool $cancelAll;

    /**
     * @var ?bool $dryRun When true, returns matching enrollments without cancelling them. cancelAll, subscriberIds, and fieldValues default to dry run unless explicitly false; a single subscriberId cancels immediately.
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?string $fieldPath Dot-path inside the token's stored entry event properties. If omitted, the sequence enrollmentFieldPath is used.
     */
    #[JsonProperty('fieldPath')]
    public ?string $fieldPath;

    /**
     * @var ?array<string> $fieldValues Entry field values to match.
     */
    #[JsonProperty('fieldValues'), ArrayType(['string'])]
    public ?array $fieldValues;

    /**
     * @var ?string $reason Optional reason stored on cancelled enrollment tokens.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $subscriberId Subscriber ID to cancel in this sequence.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?array<string> $subscriberIds Up to 500 subscriber IDs to cancel in this sequence. IDs that do not resolve are returned in target.notFoundSubscriberIds. Defaults to dry run unless dryRun is explicitly false.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   cancelAll?: ?bool,
     *   dryRun?: ?bool,
     *   fieldPath?: ?string,
     *   fieldValues?: ?array<string>,
     *   reason?: ?string,
     *   subscriberId?: ?string,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cancelAll = $values['cancelAll'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->fieldPath = $values['fieldPath'] ?? null;
        $this->fieldValues = $values['fieldValues'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }
}
