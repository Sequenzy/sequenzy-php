<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageFaqItem extends JsonSerializableType
{
    /**
     * @var string $answer
     */
    #[JsonProperty('answer')]
    public string $answer;

    /**
     * @var string $question
     */
    #[JsonProperty('question')]
    public string $question;

    /**
     * @param array{
     *   answer: string,
     *   question: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->answer = $values['answer'];
        $this->question = $values['question'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
