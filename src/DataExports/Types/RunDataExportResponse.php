<?php

namespace Sequenzy\DataExports\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\DataExport;
use Sequenzy\Core\Json\JsonProperty;

class RunDataExportResponse extends JsonSerializableType
{
    /**
     * @var ?DataExport $dataExport
     */
    #[JsonProperty('dataExport')]
    public ?DataExport $dataExport;

    /**
     * @var ?bool $queued
     */
    #[JsonProperty('queued')]
    public ?bool $queued;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   dataExport?: ?DataExport,
     *   queued?: ?bool,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dataExport = $values['dataExport'] ?? null;
        $this->queued = $values['queued'] ?? null;
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
