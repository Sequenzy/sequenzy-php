<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Sequences\Types\GetDefinitionSequencesRequestFormat;

class GetDefinitionSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetDefinitionSequencesRequestFormat> $format raw returns the explicit format. A sequence that nesting cannot describe is returned in the explicit format either way.
     */
    public ?string $format;

    /**
     * @param array{
     *   format?: ?value-of<GetDefinitionSequencesRequestFormat>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->format = $values['format'] ?? null;
    }
}
