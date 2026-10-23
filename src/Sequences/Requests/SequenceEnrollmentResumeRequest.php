<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceEnrollmentResumeRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $emails Subscriber emails to resume, matched case-insensitively.
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public ?array $emails;

    /**
     * @var ?array<string> $subscriberIds Subscriber IDs to resume.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   emails?: ?array<string>,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }
}
