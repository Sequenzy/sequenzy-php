<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class SubscriberImport extends JsonSerializableType
{
    /**
     * @var ?int $addedCount
     */
    #[JsonProperty('addedCount')]
    public ?int $addedCount;

    /**
     * @var ?string $batchId
     */
    #[JsonProperty('batchId')]
    public ?string $batchId;

    /**
     * @var ?DateTime $completedAt
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var ?int $completedChunks
     */
    #[JsonProperty('completedChunks')]
    public ?int $completedChunks;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?int $duplicateRows
     */
    #[JsonProperty('duplicateRows')]
    public ?int $duplicateRows;

    /**
     * @var ?int $emailCount
     */
    #[JsonProperty('emailCount')]
    public ?int $emailCount;

    /**
     * @var ?array<string, int> $failedChunkReasons
     */
    #[JsonProperty('failedChunkReasons'), ArrayType(['string' => 'integer'])]
    public ?array $failedChunkReasons;

    /**
     * @var ?int $failedChunks
     */
    #[JsonProperty('failedChunks')]
    public ?int $failedChunks;

    /**
     * @var ?int $failedCount
     */
    #[JsonProperty('failedCount')]
    public ?int $failedCount;

    /**
     * @var ?array<string, int> $failedReasons
     */
    #[JsonProperty('failedReasons'), ArrayType(['string' => 'integer'])]
    public ?array $failedReasons;

    /**
     * @var ?string $fileName
     */
    #[JsonProperty('fileName')]
    public ?string $fileName;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $processedCount
     */
    #[JsonProperty('processedCount')]
    public ?int $processedCount;

    /**
     * @var ?int $skippedCount
     */
    #[JsonProperty('skippedCount')]
    public ?int $skippedCount;

    /**
     * @var ?array<string, int> $skippedReasons Count per reason a row was skipped. The values sum to skippedCount.
     */
    #[JsonProperty('skippedReasons'), ArrayType(['string' => 'integer'])]
    public ?array $skippedReasons;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?value-of<SubscriberImportStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $totalChunks
     */
    #[JsonProperty('totalChunks')]
    public ?int $totalChunks;

    /**
     * @var ?int $totalRows
     */
    #[JsonProperty('totalRows')]
    public ?int $totalRows;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?int $updatedCount
     */
    #[JsonProperty('updatedCount')]
    public ?int $updatedCount;

    /**
     * @param array{
     *   addedCount?: ?int,
     *   batchId?: ?string,
     *   completedAt?: ?DateTime,
     *   completedChunks?: ?int,
     *   createdAt?: ?DateTime,
     *   duplicateRows?: ?int,
     *   emailCount?: ?int,
     *   failedChunkReasons?: ?array<string, int>,
     *   failedChunks?: ?int,
     *   failedCount?: ?int,
     *   failedReasons?: ?array<string, int>,
     *   fileName?: ?string,
     *   id?: ?string,
     *   processedCount?: ?int,
     *   skippedCount?: ?int,
     *   skippedReasons?: ?array<string, int>,
     *   startedAt?: ?DateTime,
     *   status?: ?value-of<SubscriberImportStatus>,
     *   totalChunks?: ?int,
     *   totalRows?: ?int,
     *   updatedAt?: ?DateTime,
     *   updatedCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addedCount = $values['addedCount'] ?? null;
        $this->batchId = $values['batchId'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->completedChunks = $values['completedChunks'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->duplicateRows = $values['duplicateRows'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->failedChunkReasons = $values['failedChunkReasons'] ?? null;
        $this->failedChunks = $values['failedChunks'] ?? null;
        $this->failedCount = $values['failedCount'] ?? null;
        $this->failedReasons = $values['failedReasons'] ?? null;
        $this->fileName = $values['fileName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->processedCount = $values['processedCount'] ?? null;
        $this->skippedCount = $values['skippedCount'] ?? null;
        $this->skippedReasons = $values['skippedReasons'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->totalChunks = $values['totalChunks'] ?? null;
        $this->totalRows = $values['totalRows'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->updatedCount = $values['updatedCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
