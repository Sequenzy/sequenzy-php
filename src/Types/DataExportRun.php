<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class DataExportRun extends JsonSerializableType
{
    /**
     * @var ?int $byteCount
     */
    #[JsonProperty('byteCount')]
    public ?int $byteCount;

    /**
     * @var ?string $destinationId
     */
    #[JsonProperty('destinationId')]
    public ?string $destinationId;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?int $fileCount
     */
    #[JsonProperty('fileCount')]
    public ?int $fileCount;

    /**
     * @var ?DateTime $finishedAt
     */
    #[JsonProperty('finishedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $finishedAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isManual
     */
    #[JsonProperty('isManual')]
    public ?bool $isManual;

    /**
     * @var ?int $rowCount
     */
    #[JsonProperty('rowCount')]
    public ?int $rowCount;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?array<string, array<string, mixed>> $stats Per-dataset rows, files, bytes and the window exported.
     */
    #[JsonProperty('stats'), ArrayType(['string' => ['string' => 'mixed']])]
    public ?array $stats;

    /**
     * @var ?value-of<DataExportRunStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   byteCount?: ?int,
     *   destinationId?: ?string,
     *   error?: ?string,
     *   fileCount?: ?int,
     *   finishedAt?: ?DateTime,
     *   id?: ?string,
     *   isManual?: ?bool,
     *   rowCount?: ?int,
     *   startedAt?: ?DateTime,
     *   stats?: ?array<string, array<string, mixed>>,
     *   status?: ?value-of<DataExportRunStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->byteCount = $values['byteCount'] ?? null;
        $this->destinationId = $values['destinationId'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->fileCount = $values['fileCount'] ?? null;
        $this->finishedAt = $values['finishedAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isManual = $values['isManual'] ?? null;
        $this->rowCount = $values['rowCount'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
