<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateFromExampleSequencesResponseSequenceStepsItem extends JsonSerializableType
{
    /**
     * @var ?int $delayMs Wait before this email, after the trigger or the previous email.
     */
    #[JsonProperty('delayMs')]
    public ?int $delayMs;

    /**
     * @var ?int $originalDay Day this email arrived in the example.
     */
    #[JsonProperty('originalDay')]
    public ?int $originalDay;

    /**
     * @var ?int $stepNumber
     */
    #[JsonProperty('stepNumber')]
    public ?int $stepNumber;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   delayMs?: ?int,
     *   originalDay?: ?int,
     *   stepNumber?: ?int,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->delayMs = $values['delayMs'] ?? null;
        $this->originalDay = $values['originalDay'] ?? null;
        $this->stepNumber = $values['stepNumber'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
