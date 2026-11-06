<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Sequences\Types\GetDefinitionByIdSequencesRequestFormat;

class GetDefinitionByIdSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetDefinitionByIdSequencesRequestFormat> $format raw returns the explicit format. A sequence that nesting cannot describe is returned in the explicit format either way.
     */
    public ?string $format;

    /**
     * @param array{
     *   format?: ?value-of<GetDefinitionByIdSequencesRequestFormat>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->format = $values['format'] ?? null;
    }
}
