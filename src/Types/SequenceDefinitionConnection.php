<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionConnection extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $condition Branch lane, for example {"branchId":"else"} on a logic_branch step.
     */
    #[JsonProperty('condition'), ArrayType(['string' => 'mixed'])]
    public ?array $condition;

    /**
     * @var string $from Step key.
     */
    #[JsonProperty('from')]
    public string $from;

    /**
     * @var string $to Step key.
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @param array{
     *   from: string,
     *   to: string,
     *   condition?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->condition = $values['condition'] ?? null;
        $this->from = $values['from'];
        $this->to = $values['to'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
