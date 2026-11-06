<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * CSV drafts created with csvParts, the parts received so far and declared. The import cannot start while received is lower than expected. Null otherwise.
 */
class PushImportProgressCsvParts extends JsonSerializableType
{
    /**
     * @var ?int $expected
     */
    #[JsonProperty('expected')]
    public ?int $expected;

    /**
     * @var ?int $received
     */
    #[JsonProperty('received')]
    public ?int $received;

    /**
     * @param array{
     *   expected?: ?int,
     *   received?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->expected = $values['expected'] ?? null;
        $this->received = $values['received'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
