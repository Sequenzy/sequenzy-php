<?php

namespace Sequenzy\DataExports\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\DataExportRun;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListDataExportRunsResponse extends JsonSerializableType
{
    /**
     * @var ?array<DataExportRun> $runs
     */
    #[JsonProperty('runs'), ArrayType([DataExportRun::class])]
    public ?array $runs;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   runs?: ?array<DataExportRun>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->runs = $values['runs'] ?? null;
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
