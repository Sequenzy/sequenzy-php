<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class IntegrationEventWiringRulesItem extends JsonSerializableType
{
    /**
     * @var ?array<string> $addsTags
     */
    #[JsonProperty('addsTags'), ArrayType(['string'])]
    public ?array $addsTags;

    /**
     * @var ?array<string, mixed> $conditions
     */
    #[JsonProperty('conditions'), ArrayType(['string' => 'mixed'])]
    public ?array $conditions;

    /**
     * @var ?array<string> $removesTags
     */
    #[JsonProperty('removesTags'), ArrayType(['string'])]
    public ?array $removesTags;

    /**
     * @param array{
     *   addsTags?: ?array<string>,
     *   conditions?: ?array<string, mixed>,
     *   removesTags?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addsTags = $values['addsTags'] ?? null;
        $this->conditions = $values['conditions'] ?? null;
        $this->removesTags = $values['removesTags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
