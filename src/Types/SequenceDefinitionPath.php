<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionPath extends JsonSerializableType
{
    /**
     * @var ?string $id Lane ID. Defaults to branch-<index>; else is reserved.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string, mixed> $if
     */
    #[JsonProperty('if'), ArrayType(['string' => 'mixed'])]
    public ?array $if;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?float $percent Split paths only.
     */
    #[JsonProperty('percent')]
    public ?float $percent;

    /**
     * @var ?array<SequenceDefinitionStep> $steps
     */
    #[JsonProperty('steps'), ArrayType([SequenceDefinitionStep::class])]
    public ?array $steps;

    /**
     * @param array{
     *   id?: ?string,
     *   if?: ?array<string, mixed>,
     *   label?: ?string,
     *   percent?: ?float,
     *   steps?: ?array<SequenceDefinitionStep>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->if = $values['if'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->percent = $values['percent'] ?? null;
        $this->steps = $values['steps'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
