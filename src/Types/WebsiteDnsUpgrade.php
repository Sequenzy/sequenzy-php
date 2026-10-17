<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * Upgrade of this domain to the current per-domain CNAME record set, without removing the domain. available: a verified domain on the previous record set, including an older SES-only domain that has a working DMARC record; start it with POST /websites/{domain}/dns-upgrade. in_progress: publish records next to your current records, which keep working until the switch; about an hour after every required record is visible on public DNS, the domain switches by itself. completed: shown for 30 days after the switch; delete oldRecords after deleteOldRecordsAfter. unavailable: everything else (already on the current records, not verified, verification paused, an older SES-only domain without a working DMARC record, a domain on Amazon's three-CNAME DKIM records or in the middle of an earlier records migration, a Sequenzy-managed domain, or a domain the upgrade has not been offered to yet).
 */
class WebsiteDnsUpgrade extends JsonSerializableType
{
    /**
     * @var ?DateTime $completedAt When the domain switched to the new records. Set when completed.
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var ?DateTime $deleteOldRecordsAfter The old records can be deleted from this time, 8 days after the switch; deleting them is optional. Set when completed.
     */
    #[JsonProperty('deleteOldRecordsAfter'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deleteOldRecordsAfter;

    /**
     * @var ?array<WebsiteDnsUpgradeOldRecordsItem> $oldRecords Records the domain no longer uses (the DKIM TXT at sequenzy._domainkey and the previous return path records). Set when completed. Keep them until deleteOldRecordsAfter so receivers can still check signatures and return bounces for email sent before the switch. removed turns true once a record is gone from public DNS (checked on each verification).
     */
    #[JsonProperty('oldRecords'), ArrayType([WebsiteDnsUpgradeOldRecordsItem::class])]
    public ?array $oldRecords;

    /**
     * @var ?array<WebsiteDnsUpgradeRecordsItem> $records The CNAMEs to add next to your current records. Set while in_progress, otherwise null. Only entries with required true hold back the switch; publish all of them.
     */
    #[JsonProperty('records'), ArrayType([WebsiteDnsUpgradeRecordsItem::class])]
    public ?array $records;

    /**
     * @var ?array<WebsiteDnsUpgradeReplacedRecordsItem> $replacedRecords Your current records that the upgrade replaces, which you can optionally remove about a week after the switch (the DKIM TXT at sequenzy._domainkey and the current return path records). Set while available or in_progress, otherwise null. Keep them until then.
     */
    #[JsonProperty('replacedRecords'), ArrayType([WebsiteDnsUpgradeReplacedRecordsItem::class])]
    public ?array $replacedRecords;

    /**
     * @var ?DateTime $startedAt When the upgrade started. Set while in_progress.
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var value-of<WebsiteDnsUpgradeStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   status: value-of<WebsiteDnsUpgradeStatus>,
     *   completedAt?: ?DateTime,
     *   deleteOldRecordsAfter?: ?DateTime,
     *   oldRecords?: ?array<WebsiteDnsUpgradeOldRecordsItem>,
     *   records?: ?array<WebsiteDnsUpgradeRecordsItem>,
     *   replacedRecords?: ?array<WebsiteDnsUpgradeReplacedRecordsItem>,
     *   startedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->completedAt = $values['completedAt'] ?? null;
        $this->deleteOldRecordsAfter = $values['deleteOldRecordsAfter'] ?? null;
        $this->oldRecords = $values['oldRecords'] ?? null;
        $this->records = $values['records'] ?? null;
        $this->replacedRecords = $values['replacedRecords'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
