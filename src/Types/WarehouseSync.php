<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class WarehouseSync extends JsonSerializableType
{
    /**
     * @var ?string $connectionId
     */
    #[JsonProperty('connectionId')]
    public ?string $connectionId;

    /**
     * @var ?int $consecutiveFailures
     */
    #[JsonProperty('consecutiveFailures')]
    public ?int $consecutiveFailures;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $cursorColumn
     */
    #[JsonProperty('cursorColumn')]
    public ?string $cursorColumn;

    /**
     * @var ?string $cursorValue Rows with the cursor column at or after this value are read next.
     */
    #[JsonProperty('cursorValue')]
    public ?string $cursorValue;

    /**
     * @var ?value-of<WarehouseSyncFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var ?bool $fullResyncRequested
     */
    #[JsonProperty('fullResyncRequested')]
    public ?bool $fullResyncRequested;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isEnabled
     */
    #[JsonProperty('isEnabled')]
    public ?bool $isEnabled;

    /**
     * @var ?value-of<WarehouseSyncKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $lastError
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?DateTime $lastErrorAt
     */
    #[JsonProperty('lastErrorAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastErrorAt;

    /**
     * @var ?DateTime $lastRunAt
     */
    #[JsonProperty('lastRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastRunAt;

    /**
     * @var ?DateTime $lastSuccessAt
     */
    #[JsonProperty('lastSuccessAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSuccessAt;

    /**
     * @var ?WarehouseSyncRun $latestRun
     */
    #[JsonProperty('latestRun')]
    public ?WarehouseSyncRun $latestRun;

    /**
     * @var ?array<string> $listIds
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?array<string, mixed> $mapping
     */
    #[JsonProperty('mapping'), ArrayType(['string' => 'mixed'])]
    public ?array $mapping;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $nextRunAt
     */
    #[JsonProperty('nextRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRunAt;

    /**
     * @var ?value-of<WarehouseSyncOptInMode> $optInMode
     */
    #[JsonProperty('optInMode')]
    public ?string $optInMode;

    /**
     * @var ?string $query
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?value-of<WarehouseSyncStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $triggerAutomations
     */
    #[JsonProperty('triggerAutomations')]
    public ?bool $triggerAutomations;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   connectionId?: ?string,
     *   consecutiveFailures?: ?int,
     *   createdAt?: ?DateTime,
     *   cursorColumn?: ?string,
     *   cursorValue?: ?string,
     *   frequency?: ?value-of<WarehouseSyncFrequency>,
     *   fullResyncRequested?: ?bool,
     *   id?: ?string,
     *   isEnabled?: ?bool,
     *   kind?: ?value-of<WarehouseSyncKind>,
     *   lastError?: ?string,
     *   lastErrorAt?: ?DateTime,
     *   lastRunAt?: ?DateTime,
     *   lastSuccessAt?: ?DateTime,
     *   latestRun?: ?WarehouseSyncRun,
     *   listIds?: ?array<string>,
     *   mapping?: ?array<string, mixed>,
     *   name?: ?string,
     *   nextRunAt?: ?DateTime,
     *   optInMode?: ?value-of<WarehouseSyncOptInMode>,
     *   query?: ?string,
     *   status?: ?value-of<WarehouseSyncStatus>,
     *   triggerAutomations?: ?bool,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->connectionId = $values['connectionId'] ?? null;
        $this->consecutiveFailures = $values['consecutiveFailures'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->cursorColumn = $values['cursorColumn'] ?? null;
        $this->cursorValue = $values['cursorValue'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->fullResyncRequested = $values['fullResyncRequested'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isEnabled = $values['isEnabled'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->lastErrorAt = $values['lastErrorAt'] ?? null;
        $this->lastRunAt = $values['lastRunAt'] ?? null;
        $this->lastSuccessAt = $values['lastSuccessAt'] ?? null;
        $this->latestRun = $values['latestRun'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->mapping = $values['mapping'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->nextRunAt = $values['nextRunAt'] ?? null;
        $this->optInMode = $values['optInMode'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->triggerAutomations = $values['triggerAutomations'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
