<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceAudienceEnrollment;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListAudienceEnrollmentsSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?array<SequenceAudienceEnrollment> $audienceEnrollments
     */
    #[JsonProperty('audienceEnrollments'), ArrayType([SequenceAudienceEnrollment::class])]
    public ?array $audienceEnrollments;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   audienceEnrollments?: ?array<SequenceAudienceEnrollment>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceEnrollments = $values['audienceEnrollments'] ?? null;
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
