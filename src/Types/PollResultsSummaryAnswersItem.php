<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PollResultsSummaryAnswersItem extends JsonSerializableType
{
    /**
     * @var ?string $answer Human-readable answer label captured when the response was recorded.
     */
    #[JsonProperty('answer')]
    public ?string $answer;

    /**
     * @var ?float $percentage Share of the poll's respondents (0-100, one decimal). Sums can exceed 100 for multi-select polls.
     */
    #[JsonProperty('percentage')]
    public ?float $percentage;

    /**
     * @var ?int $responses
     */
    #[JsonProperty('responses')]
    public ?int $responses;

    /**
     * @var ?string $value Stable stored answer value. Use this field as the answer identifier when labels can change.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   answer?: ?string,
     *   percentage?: ?float,
     *   responses?: ?int,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->answer = $values['answer'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
        $this->responses = $values['responses'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
