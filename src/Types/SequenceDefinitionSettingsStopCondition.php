<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceDefinitionSettingsStopCondition extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $matchConfig
     */
    #[JsonProperty('matchConfig'), ArrayType(['string' => 'mixed'])]
    public ?array $matchConfig;

    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $value
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   type: string,
     *   matchConfig?: ?array<string, mixed>,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->matchConfig = $values['matchConfig'] ?? null;
        $this->type = $values['type'];
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
