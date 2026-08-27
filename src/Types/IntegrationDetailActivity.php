<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class IntegrationDetailActivity extends JsonSerializableType
{
    /**
     * @var ?int $failed
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?DateTime $lastActivityAt
     */
    #[JsonProperty('lastActivityAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastActivityAt;

    /**
     * @var ?int $processed
     */
    #[JsonProperty('processed')]
    public ?int $processed;

    /**
     * @var ?array<IntegrationDetailActivityRecentFailuresItem> $recentFailures
     */
    #[JsonProperty('recentFailures'), ArrayType([IntegrationDetailActivityRecentFailuresItem::class])]
    public ?array $recentFailures;

    /**
     * @var ?int $skipped
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @var ?int $stalled Events queued more than 15 minutes without completing.
     */
    #[JsonProperty('stalled')]
    public ?int $stalled;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $windowHours
     */
    #[JsonProperty('windowHours')]
    public ?int $windowHours;

    /**
     * @param array{
     *   failed?: ?int,
     *   lastActivityAt?: ?DateTime,
     *   processed?: ?int,
     *   recentFailures?: ?array<IntegrationDetailActivityRecentFailuresItem>,
     *   skipped?: ?int,
     *   stalled?: ?int,
     *   total?: ?int,
     *   windowHours?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->failed = $values['failed'] ?? null;
        $this->lastActivityAt = $values['lastActivityAt'] ?? null;
        $this->processed = $values['processed'] ?? null;
        $this->recentFailures = $values['recentFailures'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->stalled = $values['stalled'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->windowHours = $values['windowHours'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
