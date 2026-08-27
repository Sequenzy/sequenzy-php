<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * What this integration does to the contact list: whether bulk backfills run, and which lists the contacts created by the provider's live webhook join. Neither setting stops that webhook creating contacts.
 */
class IntegrationDetailIngestion extends JsonSerializableType
{
    /**
     * @var ?bool $bulkSyncEnabled Bulk imports and backfills. Same value as integration.syncEnabled.
     */
    #[JsonProperty('bulkSyncEnabled')]
    public ?bool $bulkSyncEnabled;

    /**
     * @var ?array<string> $listIds Configured target lists. Null means new contacts follow the workspace default lists.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?array<IntegrationDetailIngestionListsItem> $lists Names for the configured lists.
     */
    #[JsonProperty('lists'), ArrayType([IntegrationDetailIngestionListsItem::class])]
    public ?array $lists;

    /**
     * @var ?value-of<IntegrationDetailIngestionListTargeting> $listTargeting Where contacts created by this integration land. Null for providers that ignore per-integration list targeting.
     */
    #[JsonProperty('listTargeting')]
    public ?string $listTargeting;

    /**
     * @var ?array<string> $missingListIds Configured IDs whose list no longer exists. Deleting a list does not scrub it from integration settings and ingestion silently skips it, so these are targets nothing actually joins.
     */
    #[JsonProperty('missingListIds'), ArrayType(['string'])]
    public ?array $missingListIds;

    /**
     * @var ?string $summary One sentence naming where this integration's new contacts land.
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?bool $supportsListTargeting
     */
    #[JsonProperty('supportsListTargeting')]
    public ?bool $supportsListTargeting;

    /**
     * @param array{
     *   bulkSyncEnabled?: ?bool,
     *   listIds?: ?array<string>,
     *   lists?: ?array<IntegrationDetailIngestionListsItem>,
     *   listTargeting?: ?value-of<IntegrationDetailIngestionListTargeting>,
     *   missingListIds?: ?array<string>,
     *   summary?: ?string,
     *   supportsListTargeting?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bulkSyncEnabled = $values['bulkSyncEnabled'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->lists = $values['lists'] ?? null;
        $this->listTargeting = $values['listTargeting'] ?? null;
        $this->missingListIds = $values['missingListIds'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->supportsListTargeting = $values['supportsListTargeting'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
