<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceAudienceEnrollment;
use Sequenzy\Core\Json\JsonProperty;

class EnrollAudienceSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceAudienceEnrollment $audienceEnrollment
     */
    #[JsonProperty('audienceEnrollment')]
    public ?SequenceAudienceEnrollment $audienceEnrollment;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   audienceEnrollment?: ?SequenceAudienceEnrollment,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceEnrollment = $values['audienceEnrollment'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
