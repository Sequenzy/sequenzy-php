<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceSummary;
use Sequenzy\Core\Json\JsonProperty;

class UnarchiveSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceSummary $sequence
     */
    #[JsonProperty('sequence')]
    public ?SequenceSummary $sequence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   sequence?: ?SequenceSummary,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sequence = $values['sequence'] ?? null;
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
