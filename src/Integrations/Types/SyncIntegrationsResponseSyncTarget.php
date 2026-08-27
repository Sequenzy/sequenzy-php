<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Supabase only - the source the backfill reads. Absent for providers whose sync has no configurable source.
 */
class SyncIntegrationsResponseSyncTarget extends JsonSerializableType
{
    /**
     * @var ?string $projectRef
     */
    #[JsonProperty('projectRef')]
    public ?string $projectRef;

    /**
     * @var ?string $schema
     */
    #[JsonProperty('schema')]
    public ?string $schema;

    /**
     * @var ?string $table
     */
    #[JsonProperty('table')]
    public ?string $table;

    /**
     * @param array{
     *   projectRef?: ?string,
     *   schema?: ?string,
     *   table?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->projectRef = $values['projectRef'] ?? null;
        $this->schema = $values['schema'] ?? null;
        $this->table = $values['table'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
