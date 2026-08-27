<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present for NPS polls only.
 */
class PollResultsSummaryNps extends JsonSerializableType
{
    /**
     * @var ?float $average
     */
    #[JsonProperty('average')]
    public ?float $average;

    /**
     * @var ?int $detractors
     */
    #[JsonProperty('detractors')]
    public ?int $detractors;

    /**
     * @var ?int $passives
     */
    #[JsonProperty('passives')]
    public ?int $passives;

    /**
     * @var ?int $promoters
     */
    #[JsonProperty('promoters')]
    public ?int $promoters;

    /**
     * @var ?int $score Net Promoter Score (-100 to 100)
     */
    #[JsonProperty('score')]
    public ?int $score;

    /**
     * @param array{
     *   average?: ?float,
     *   detractors?: ?int,
     *   passives?: ?int,
     *   promoters?: ?int,
     *   score?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->average = $values['average'] ?? null;
        $this->detractors = $values['detractors'] ?? null;
        $this->passives = $values['passives'] ?? null;
        $this->promoters = $values['promoters'] ?? null;
        $this->score = $values['score'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
