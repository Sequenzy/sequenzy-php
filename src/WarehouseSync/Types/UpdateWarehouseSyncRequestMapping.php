<?php

namespace Sequenzy\WarehouseSync\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Subscriber syncs: emailColumn (or phoneColumn), externalIdColumn, firstNameColumn, lastNameColumn, tagsColumn, attributes. Event syncs: emailColumn or externalIdColumn, eventNameColumn or eventName, eventIdColumn, occurredAtColumn, properties. Every column must exist in the query.
 */
class UpdateWarehouseSyncRequestMapping extends JsonSerializableType
{
    /**
     * @var ?array<UpdateWarehouseSyncRequestMappingAttributesItem> $attributes
     */
    #[JsonProperty('attributes'), ArrayType([UpdateWarehouseSyncRequestMappingAttributesItem::class])]
    public ?array $attributes;

    /**
     * @var ?string $emailColumn
     */
    #[JsonProperty('emailColumn')]
    public ?string $emailColumn;

    /**
     * @var ?string $eventIdColumn Stable ID per event. Derived from the row when omitted.
     */
    #[JsonProperty('eventIdColumn')]
    public ?string $eventIdColumn;

    /**
     * @var ?string $eventName Fixed event name when no event name column is mapped.
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?string $eventNameColumn
     */
    #[JsonProperty('eventNameColumn')]
    public ?string $eventNameColumn;

    /**
     * @var ?string $externalIdColumn
     */
    #[JsonProperty('externalIdColumn')]
    public ?string $externalIdColumn;

    /**
     * @var ?string $firstNameColumn
     */
    #[JsonProperty('firstNameColumn')]
    public ?string $firstNameColumn;

    /**
     * @var ?string $lastNameColumn
     */
    #[JsonProperty('lastNameColumn')]
    public ?string $lastNameColumn;

    /**
     * @var ?string $occurredAtColumn Timestamp column. Defaults to the sync time.
     */
    #[JsonProperty('occurredAtColumn')]
    public ?string $occurredAtColumn;

    /**
     * @var ?string $phoneColumn
     */
    #[JsonProperty('phoneColumn')]
    public ?string $phoneColumn;

    /**
     * @var ?array<UpdateWarehouseSyncRequestMappingPropertiesItem> $properties
     */
    #[JsonProperty('properties'), ArrayType([UpdateWarehouseSyncRequestMappingPropertiesItem::class])]
    public ?array $properties;

    /**
     * @var ?string $tagsColumn Array column or a comma-separated string.
     */
    #[JsonProperty('tagsColumn')]
    public ?string $tagsColumn;

    /**
     * @param array{
     *   attributes?: ?array<UpdateWarehouseSyncRequestMappingAttributesItem>,
     *   emailColumn?: ?string,
     *   eventIdColumn?: ?string,
     *   eventName?: ?string,
     *   eventNameColumn?: ?string,
     *   externalIdColumn?: ?string,
     *   firstNameColumn?: ?string,
     *   lastNameColumn?: ?string,
     *   occurredAtColumn?: ?string,
     *   phoneColumn?: ?string,
     *   properties?: ?array<UpdateWarehouseSyncRequestMappingPropertiesItem>,
     *   tagsColumn?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attributes = $values['attributes'] ?? null;
        $this->emailColumn = $values['emailColumn'] ?? null;
        $this->eventIdColumn = $values['eventIdColumn'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->eventNameColumn = $values['eventNameColumn'] ?? null;
        $this->externalIdColumn = $values['externalIdColumn'] ?? null;
        $this->firstNameColumn = $values['firstNameColumn'] ?? null;
        $this->lastNameColumn = $values['lastNameColumn'] ?? null;
        $this->occurredAtColumn = $values['occurredAtColumn'] ?? null;
        $this->phoneColumn = $values['phoneColumn'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->tagsColumn = $values['tagsColumn'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
