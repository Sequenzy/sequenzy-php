<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EstimateAudienceEnrollmentSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?int $alreadyEnrolledCount Matching contacts that would be skipped because they are already in the sequence.
     */
    #[JsonProperty('alreadyEnrolledCount')]
    public ?int $alreadyEnrolledCount;

    /**
     * @var ?int $enrollableCount
     */
    #[JsonProperty('enrollableCount')]
    public ?int $enrollableCount;

    /**
     * @var ?int $matchingCount Active contacts with an email matching the audience.
     */
    #[JsonProperty('matchingCount')]
    public ?int $matchingCount;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   alreadyEnrolledCount?: ?int,
     *   enrollableCount?: ?int,
     *   matchingCount?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->alreadyEnrolledCount = $values['alreadyEnrolledCount'] ?? null;
        $this->enrollableCount = $values['enrollableCount'] ?? null;
        $this->matchingCount = $values['matchingCount'] ?? null;
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
