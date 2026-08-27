<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ImportEventsSubscribersResponseSideEffectFailuresItem extends JsonSerializableType
{
    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?int $index
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @var ?array<string> $stages
     */
    #[JsonProperty('stages'), ArrayType(['string'])]
    public ?array $stages;

    /**
     * @param array{
     *   error?: ?string,
     *   index?: ?int,
     *   stages?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->error = $values['error'] ?? null;
        $this->index = $values['index'] ?? null;
        $this->stages = $values['stages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
