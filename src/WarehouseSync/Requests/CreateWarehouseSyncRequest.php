<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\WarehouseSync\Types\CreateWarehouseSyncRequestFrequency;
use Sequenzy\WarehouseSync\Types\CreateWarehouseSyncRequestKind;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\WarehouseSync\Types\CreateWarehouseSyncRequestMapping;
use Sequenzy\WarehouseSync\Types\CreateWarehouseSyncRequestOptInMode;

class CreateWarehouseSyncRequest extends JsonSerializableType
{
    /**
     * @var string $connectionId
     */
    #[JsonProperty('connectionId')]
    public string $connectionId;

    /**
     * @var ?string $cursorColumn Column read incrementally, for example updated_at. Each run reads rows at or after the last value it saw.
     */
    #[JsonProperty('cursorColumn')]
    public ?string $cursorColumn;

    /**
     * @var ?value-of<CreateWarehouseSyncRequestFrequency> $frequency
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var value-of<CreateWarehouseSyncRequestKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var ?array<string> $listIds Subscriber syncs only. Lists new contacts join.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var CreateWarehouseSyncRequestMapping $mapping Subscriber syncs: emailColumn (or phoneColumn), externalIdColumn, firstNameColumn, lastNameColumn, tagsColumn, attributes. Event syncs: emailColumn or externalIdColumn, eventNameColumn or eventName, eventIdColumn, occurredAtColumn, properties. Every column must exist in the query.
     */
    #[JsonProperty('mapping')]
    public CreateWarehouseSyncRequestMapping $mapping;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?value-of<CreateWarehouseSyncRequestOptInMode> $optInMode Subscriber syncs only. double_opt_in needs automations:trigger.
     */
    #[JsonProperty('optInMode')]
    public ?string $optInMode;

    /**
     * @var string $query A single SELECT or WITH statement.
     */
    #[JsonProperty('query')]
    public string $query;

    /**
     * @var ?bool $triggerAutomations Let new contacts, or events from the last hour, start automations. Needs automations:trigger.
     */
    #[JsonProperty('triggerAutomations')]
    public ?bool $triggerAutomations;

    /**
     * @param array{
     *   connectionId: string,
     *   kind: value-of<CreateWarehouseSyncRequestKind>,
     *   mapping: CreateWarehouseSyncRequestMapping,
     *   name: string,
     *   query: string,
     *   cursorColumn?: ?string,
     *   frequency?: ?value-of<CreateWarehouseSyncRequestFrequency>,
     *   listIds?: ?array<string>,
     *   optInMode?: ?value-of<CreateWarehouseSyncRequestOptInMode>,
     *   triggerAutomations?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->connectionId = $values['connectionId'];
        $this->cursorColumn = $values['cursorColumn'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->kind = $values['kind'];
        $this->listIds = $values['listIds'] ?? null;
        $this->mapping = $values['mapping'];
        $this->name = $values['name'];
        $this->optInMode = $values['optInMode'] ?? null;
        $this->query = $values['query'];
        $this->triggerAutomations = $values['triggerAutomations'] ?? null;
    }
}
