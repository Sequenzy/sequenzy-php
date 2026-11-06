<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushImportProgress extends JsonSerializableType
{
    /**
     * @var ?PushImportProgressCsvParts $csvParts CSV drafts created with csvParts, the parts received so far and declared. The import cannot start while received is lower than expected. Null otherwise.
     */
    #[JsonProperty('csvParts')]
    public ?PushImportProgressCsvParts $csvParts;

    /**
     * @var ?int $percent 0-100, or null while the source is still exporting.
     */
    #[JsonProperty('percent')]
    public ?int $percent;

    /**
     * @var ?int $processedRows
     */
    #[JsonProperty('processedRows')]
    public ?int $processedRows;

    /**
     * @var ?int $recordsRead Source records read so far.
     */
    #[JsonProperty('recordsRead')]
    public ?int $recordsRead;

    /**
     * @var ?int $totalRows Devices staged for import.
     */
    #[JsonProperty('totalRows')]
    public ?int $totalRows;

    /**
     * @param array{
     *   csvParts?: ?PushImportProgressCsvParts,
     *   percent?: ?int,
     *   processedRows?: ?int,
     *   recordsRead?: ?int,
     *   totalRows?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->csvParts = $values['csvParts'] ?? null;
        $this->percent = $values['percent'] ?? null;
        $this->processedRows = $values['processedRows'] ?? null;
        $this->recordsRead = $values['recordsRead'] ?? null;
        $this->totalRows = $values['totalRows'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
