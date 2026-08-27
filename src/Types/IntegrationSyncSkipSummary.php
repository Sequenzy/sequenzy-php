<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Summary of records a store import could not bring in normally. A store with real order history often carries a few addresses on domains that have since been shut down; those are reported here instead of failing the whole import.
 */
class IntegrationSyncSkipSummary extends JsonSerializableType
{
    /**
     * @var ?array<IntegrationSyncSkipSummaryRecordsItem> $records Sample of the affected records, up to 50.
     */
    #[JsonProperty('records'), ArrayType([IntegrationSyncSkipSummaryRecordsItem::class])]
    public ?array $records;

    /**
     * @var ?int $skipped Not imported at all.
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @var ?int $suppressed Imported, but the address cannot receive email, so the profile is stored as bounced and sends stay suppressed. Order history still attaches to it.
     */
    #[JsonProperty('suppressed')]
    public ?int $suppressed;

    /**
     * @var ?int $total Every affected record, including any beyond the stored sample.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?bool $truncated True when more records were affected than `records` holds.
     */
    #[JsonProperty('truncated')]
    public ?bool $truncated;

    /**
     * @param array{
     *   records?: ?array<IntegrationSyncSkipSummaryRecordsItem>,
     *   skipped?: ?int,
     *   suppressed?: ?int,
     *   total?: ?int,
     *   truncated?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->records = $values['records'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->suppressed = $values['suppressed'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->truncated = $values['truncated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
