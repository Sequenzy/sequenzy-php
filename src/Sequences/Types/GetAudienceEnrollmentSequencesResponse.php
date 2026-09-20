<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceAudienceEnrollment;
use Sequenzy\Core\Json\JsonProperty;

class GetAudienceEnrollmentSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceAudienceEnrollment $audienceEnrollment
     */
    #[JsonProperty('audienceEnrollment')]
    public ?SequenceAudienceEnrollment $audienceEnrollment;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   audienceEnrollment?: ?SequenceAudienceEnrollment,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceEnrollment = $values['audienceEnrollment'] ?? null;
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
