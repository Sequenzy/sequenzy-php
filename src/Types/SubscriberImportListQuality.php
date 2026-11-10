<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * Set when the list has too many addresses that don't exist or look risky; null otherwise. None of its contacts are imported (every row is skipped as list_needs_cleaning). An import stays running, with nothing processed, until its list check is done.
 */
class SubscriberImportListQuality extends JsonSerializableType
{
    /**
     * @var ?DateTime $checkedAt
     */
    #[JsonProperty('checkedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $checkedAt;

    /**
     * @var ?string $cleaningUrl A list-cleaning service to clean the list with.
     */
    #[JsonProperty('cleaningUrl')]
    public ?string $cleaningUrl;

    /**
     * @var ?array<SubscriberImportListQualityIssuesItem> $issues What needs cleaning, as estimated shares of the list. A list can need cleaning for any of them, not only for addresses that don't exist.
     */
    #[JsonProperty('issues'), ArrayType([SubscriberImportListQualityIssuesItem::class])]
    public ?array $issues;

    /**
     * @var ?string $message Customer-facing explanation and recommendation.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?int $sampleSize Addresses in the checked sample.
     */
    #[JsonProperty('sampleSize')]
    public ?int $sampleSize;

    /**
     * @var ?value-of<SubscriberImportListQualityStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $undeliverableCount Addresses in the sample that don't exist.
     */
    #[JsonProperty('undeliverableCount')]
    public ?int $undeliverableCount;

    /**
     * @var ?float $undeliverableRate Estimated share of the list's addresses that don't exist, from 0 to 1.
     */
    #[JsonProperty('undeliverableRate')]
    public ?float $undeliverableRate;

    /**
     * @param array{
     *   checkedAt?: ?DateTime,
     *   cleaningUrl?: ?string,
     *   issues?: ?array<SubscriberImportListQualityIssuesItem>,
     *   message?: ?string,
     *   sampleSize?: ?int,
     *   status?: ?value-of<SubscriberImportListQualityStatus>,
     *   undeliverableCount?: ?int,
     *   undeliverableRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->checkedAt = $values['checkedAt'] ?? null;
        $this->cleaningUrl = $values['cleaningUrl'] ?? null;
        $this->issues = $values['issues'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->sampleSize = $values['sampleSize'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->undeliverableCount = $values['undeliverableCount'] ?? null;
        $this->undeliverableRate = $values['undeliverableRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
