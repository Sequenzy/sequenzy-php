<?php

namespace Sequenzy\AbTests\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetStatsAbTestsResponseVariantsItem extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isWinner
     */
    #[JsonProperty('isWinner')]
    public ?bool $isWinner;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?array<string, mixed> $stats
     */
    #[JsonProperty('stats'), ArrayType(['string' => 'mixed'])]
    public ?array $stats;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @param array{
     *   id?: ?string,
     *   isWinner?: ?bool,
     *   label?: ?string,
     *   stats?: ?array<string, mixed>,
     *   subject?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->isWinner = $values['isWinner'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->subject = $values['subject'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
