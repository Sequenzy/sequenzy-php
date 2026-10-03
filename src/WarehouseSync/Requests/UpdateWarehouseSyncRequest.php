<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\WarehouseSync\Types\UpdateWarehouseSyncRequestFrequency;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\WarehouseSync\Types\UpdateWarehouseSyncRequestMapping;
use Sequenzy\WarehouseSync\Types\UpdateWarehouseSyncRequestOptInMode;

class UpdateWarehouseSyncRequest extends JsonSerializableType
{
    /**
     * @var ?string $cursorColumn Column read incrementally, for example updated_at. Each run reads rows at or after the last value it saw.
     */
    #[JsonProperty('cursorColumn')]
    public ?string $cursorColumn;

    /**
     * @var ?value-of<UpdateWarehouseSyncRequestFrequency> $frequency manual cancels the next scheduled run.
     */
    #[JsonProperty('frequency')]
    public ?string $frequency;

    /**
     * @var ?bool $isEnabled false pauses the sync, true resumes it.
     */
    #[JsonProperty('isEnabled')]
    public ?bool $isEnabled;

    /**
     * @var ?array<string> $listIds Subscriber syncs only. Lists that contacts the sync creates join; existing contacts keep their list memberships.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?UpdateWarehouseSyncRequestMapping $mapping Subscriber syncs: emailColumn (or phoneColumn), externalIdColumn, firstNameColumn, lastNameColumn, tagsColumn, attributes. Event syncs: emailColumn or externalIdColumn, eventNameColumn or eventName, eventIdColumn, occurredAtColumn, properties. Every column must exist in the query.
     */
    #[JsonProperty('mapping')]
    public ?UpdateWarehouseSyncRequestMapping $mapping;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<UpdateWarehouseSyncRequestOptInMode> $optInMode Subscriber syncs only. double_opt_in needs automations:trigger.
     */
    #[JsonProperty('optInMode')]
    public ?string $optInMode;

    /**
     * @var ?string $query
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?bool $triggerAutomations Let new contacts, or events from the last hour, start automations. Needs automations:trigger.
     */
    #[JsonProperty('triggerAutomations')]
    public ?bool $triggerAutomations;

    /**
     * @param array{
     *   cursorColumn?: ?string,
     *   frequency?: ?value-of<UpdateWarehouseSyncRequestFrequency>,
     *   isEnabled?: ?bool,
     *   listIds?: ?array<string>,
     *   mapping?: ?UpdateWarehouseSyncRequestMapping,
     *   name?: ?string,
     *   optInMode?: ?value-of<UpdateWarehouseSyncRequestOptInMode>,
     *   query?: ?string,
     *   triggerAutomations?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursorColumn = $values['cursorColumn'] ?? null;
        $this->frequency = $values['frequency'] ?? null;
        $this->isEnabled = $values['isEnabled'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->mapping = $values['mapping'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->optInMode = $values['optInMode'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->triggerAutomations = $values['triggerAutomations'] ?? null;
    }
}
