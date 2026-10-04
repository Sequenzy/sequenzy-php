<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailCheckCategoryScore extends JsonSerializableType
{
    /**
     * @var ?int $maxScore
     */
    #[JsonProperty('maxScore')]
    public ?int $maxScore;

    /**
     * @var ?int $score
     */
    #[JsonProperty('score')]
    public ?int $score;

    /**
     * @param array{
     *   maxScore?: ?int,
     *   score?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->maxScore = $values['maxScore'] ?? null;
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
