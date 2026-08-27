<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceDetails;
use Sequenzy\Core\Json\JsonProperty;

class GetSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceDetails $sequence
     */
    #[JsonProperty('sequence')]
    public ?SequenceDetails $sequence;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   sequence?: ?SequenceDetails,
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
