<?php

namespace Sequenzy\DataExports\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\DataExport;
use Sequenzy\Core\Json\JsonProperty;

class UpdateDataExportResponse extends JsonSerializableType
{
    /**
     * @var ?DataExport $dataExport
     */
    #[JsonProperty('dataExport')]
    public ?DataExport $dataExport;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   dataExport?: ?DataExport,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dataExport = $values['dataExport'] ?? null;
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
