<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class WarehouseSyncRun extends JsonSerializableType
{
    /**
     * @var ?array<WarehouseSyncRunImportsItem> $imports Progress of the subscriber imports this run queued.
     */
    #[JsonProperty('imports'), ArrayType([WarehouseSyncRunImportsItem::class])]
    public ?array $imports;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?array<WarehouseSyncRunErrorSamplesItem> $errorSamples
     */
    #[JsonProperty('errorSamples'), ArrayType([WarehouseSyncRunErrorSamplesItem::class])]
    public ?array $errorSamples;

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
     * @var ?bool $isFullResync
     */
    #[JsonProperty('isFullResync')]
    public ?bool $isFullResync;

    /**
     * @var ?bool $isManual
     */
    #[JsonProperty('isManual')]
    public ?bool $isManual;

    /**
     * @var ?int $rowsFailed Rows Sequenzy could not write this time. The cursor stays at the first of them, so the next run reads them again.
     */
    #[JsonProperty('rowsFailed')]
    public ?int $rowsFailed;

    /**
     * @var ?int $rowsRead
     */
    #[JsonProperty('rowsRead')]
    public ?int $rowsRead;

    /**
     * @var ?int $rowsSkipped Rows missing required values, or events for unknown contacts. Read again when the row changes, on a full resync, or on every run without a cursor column.
     */
    #[JsonProperty('rowsSkipped')]
    public ?int $rowsSkipped;

    /**
     * @var ?int $rowsSynced
     */
    #[JsonProperty('rowsSynced')]
    public ?int $rowsSynced;

    /**
     * @var ?int $rowsUnchanged Rows skipped because they did not change since they were last sent.
     */
    #[JsonProperty('rowsUnchanged')]
    public ?int $rowsUnchanged;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?value-of<WarehouseSyncRunStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string> $subscriberImportIds
     */
    #[JsonProperty('subscriberImportIds'), ArrayType(['string'])]
    public ?array $subscriberImportIds;

    /**
     * @var ?string $syncId
     */
    #[JsonProperty('syncId')]
    public ?string $syncId;

    /**
     * @param array{
     *   imports?: ?array<WarehouseSyncRunImportsItem>,
     *   error?: ?string,
     *   errorSamples?: ?array<WarehouseSyncRunErrorSamplesItem>,
     *   finishedAt?: ?DateTime,
     *   id?: ?string,
     *   isFullResync?: ?bool,
     *   isManual?: ?bool,
     *   rowsFailed?: ?int,
     *   rowsRead?: ?int,
     *   rowsSkipped?: ?int,
     *   rowsSynced?: ?int,
     *   rowsUnchanged?: ?int,
     *   startedAt?: ?DateTime,
     *   status?: ?value-of<WarehouseSyncRunStatus>,
     *   subscriberImportIds?: ?array<string>,
     *   syncId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->imports = $values['imports'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->errorSamples = $values['errorSamples'] ?? null;
        $this->finishedAt = $values['finishedAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isFullResync = $values['isFullResync'] ?? null;
        $this->isManual = $values['isManual'] ?? null;
        $this->rowsFailed = $values['rowsFailed'] ?? null;
        $this->rowsRead = $values['rowsRead'] ?? null;
        $this->rowsSkipped = $values['rowsSkipped'] ?? null;
        $this->rowsSynced = $values['rowsSynced'] ?? null;
        $this->rowsUnchanged = $values['rowsUnchanged'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberImportIds = $values['subscriberImportIds'] ?? null;
        $this->syncId = $values['syncId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
