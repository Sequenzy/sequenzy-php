<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetSequenceMetricsResponseBranchesItemUnrecorded extends JsonSerializableType
{
    /**
     * @var ?int $decisions
     */
    #[JsonProperty('decisions')]
    public ?int $decisions;

    /**
     * @param array{
     *   decisions?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->decisions = $values['decisions'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
