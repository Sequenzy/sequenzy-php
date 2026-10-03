<?php

namespace Sequenzy\DataExports\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\DataExport;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListDataExportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<DataExport> $dataExports
     */
    #[JsonProperty('dataExports'), ArrayType([DataExport::class])]
    public ?array $dataExports;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   dataExports?: ?array<DataExport>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dataExports = $values['dataExports'] ?? null;
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
