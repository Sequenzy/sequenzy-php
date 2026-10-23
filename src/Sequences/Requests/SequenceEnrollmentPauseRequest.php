<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentPauseRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $emails Subscriber emails to pause, matched case-insensitively. Emails that match no contact come back in notFound.emails.
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public ?array $emails;

    /**
     * @var ?string $reason Note stored on each paused enrollment and returned as pauseReason by list enrollments.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?array<string> $subscriberIds Subscriber IDs to pause. IDs that match no contact come back in notFound.subscriberIds.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   emails?: ?array<string>,
     *   reason?: ?string,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }
}
