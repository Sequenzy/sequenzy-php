<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SequenceCreateResponseEventTrackingIntegrationGuide extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $arguments
     */
    #[JsonProperty('arguments'), ArrayType(['string' => 'mixed'])]
    public ?array $arguments;

    /**
     * @var ?string $tool
     */
    #[JsonProperty('tool')]
    public ?string $tool;

    /**
     * @param array{
     *   arguments?: ?array<string, mixed>,
     *   tool?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->arguments = $values['arguments'] ?? null;
        $this->tool = $values['tool'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
