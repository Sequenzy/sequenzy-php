<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * The early exit rule the sequence was created with, when it has one. Abandoned cart stops on `ecommerce.order_placed`; re-engagement stops when the `inactive` tag is removed (`does_not_have_tag`).
 */
class CreateFromExampleSequencesResponseSequenceStopCondition extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $matchConfig
     */
    #[JsonProperty('matchConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $matchConfig;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $value
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   matchConfig?: ?array<string, mixed>,
     *   type?: ?string,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->matchConfig = $values['matchConfig'] ?? null;
        $this->type = $values['type'] ?? null;
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
