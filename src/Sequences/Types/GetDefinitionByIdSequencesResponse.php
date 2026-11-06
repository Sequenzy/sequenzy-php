<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceDefinition;
use Sequenzy\Core\Json\JsonProperty;

class GetDefinitionByIdSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?SequenceDefinition $definition
     */
    #[JsonProperty('definition')]
    public ?SequenceDefinition $definition;

    /**
     * @var ?value-of<GetDefinitionByIdSequencesResponseFormat> $format The format of definition.
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   definition?: ?SequenceDefinition,
     *   format?: ?value-of<GetDefinitionByIdSequencesResponseFormat>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->definition = $values['definition'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
