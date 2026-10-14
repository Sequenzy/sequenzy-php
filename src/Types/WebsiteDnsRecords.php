<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * The DNS records and their per-record verification status. Publish the DKIM record, DMARC when present, and the bounce records described by bounceRecords (returnPathCnameRecord when bounceRecords.style is cname, otherwise spfRecord and mxRecord; never both at the same name). Receiving mail is set up separately with receiving domains (/receiving-domains); the inbound* fields some older domains still return are deprecated. GET returns stored results; POST verify performs a fresh check.
 */
class WebsiteDnsRecords extends JsonSerializableType
{
    /**
     * @var ?string $inboundRoutingError Deprecated. Receiving is now set up with receiving domains (/receiving-domains). This field reflects a reply setup from before receiving domains, is only present on domains that had one, and is no longer used to route mail. Null when no error was stored; omitted when the domain has no stored inbound MX record. Read the receiving domain's error instead.
     */
    #[JsonProperty('inboundRoutingError')]
    public ?string $inboundRoutingError;

    /**
     * @var ?value-of<WebsiteDnsRecordsInboundRoutingStatus> $inboundRoutingStatus Deprecated. Receiving is now set up with receiving domains (/receiving-domains). This field reflects a reply setup from before receiving domains, is only present on domains that had one, and is no longer used to route mail. Returned when the domain has a stored inbound MX record. Read the receiving domain's status instead.
     */
    #[JsonProperty('inboundRoutingStatus')]
    public ?string $inboundRoutingStatus;

    /**
     * @var ?WebsiteDnsRecordsInboundVerificationRecord $inboundVerificationRecord Deprecated. Receiving is now set up with receiving domains (/receiving-domains). This field reflects a reply setup from before receiving domains, is only present on domains that had one, and is no longer used to route mail. It held the TXT record an older inbound reply host needed for Amazon SES ownership; a migrated host's records now appear on its receiving domain.
     */
    #[JsonProperty('inboundVerificationRecord')]
    public ?WebsiteDnsRecordsInboundVerificationRecord $inboundVerificationRecord;

    /**
     * @var ?value-of<WebsiteDnsRecordsInboundVerificationStatus> $inboundVerificationStatus Deprecated. Receiving is now set up with receiving domains (/receiving-domains). This field reflects a reply setup from before receiving domains, is only present on domains that had one, and is no longer used to route mail. It held the stored ownership status of the older inbound reply host.
     */
    #[JsonProperty('inboundVerificationStatus')]
    public ?string $inboundVerificationStatus;

    /**
     * @var ?array<WebsiteDnsRecordsPlatformDnsRecordsItem> $platformDnsRecords Present on domains added with the per-domain CNAME record set. Publish these CNAMEs instead of the DKIM TXT record in byodkimRecord (a TXT published there still verifies, but a key change then needs a DNS change). Branch on whether this field is present. Only entries with required true block verification. dkim_spare lets Sequenzy change the DKIM key without a DNS change from you; ses_return_path, once it resolves, aligns SPF with your domain on every email.
     */
    #[JsonProperty('platformDnsRecords'), ArrayType([WebsiteDnsRecordsPlatformDnsRecordsItem::class])]
    public ?array $platformDnsRecords;

    /**
     * @var ?array<string, mixed> $returnPathCnameDiagnostic Why the bounce CNAME is not verified yet, when known.
     */
    #[JsonProperty('returnPathCnameDiagnostic'), ArrayType(['string' => 'mixed'])]
    public ?array $returnPathCnameDiagnostic;

    /**
     * @var ?WebsiteDnsRecordsReturnPathCnameRecord $returnPathCnameRecord The single bounce CNAME, present when bounceRecords.style is cname. It replaces spfRecord and mxRecord, which stay listed because verification checks them through the CNAME. Never publish it alongside them.
     */
    #[JsonProperty('returnPathCnameRecord')]
    public ?WebsiteDnsRecordsReturnPathCnameRecord $returnPathCnameRecord;

    /**
     * @var ?value-of<WebsiteDnsRecordsReturnPathCnameStatus> $returnPathCnameStatus
     */
    #[JsonProperty('returnPathCnameStatus')]
    public ?string $returnPathCnameStatus;

    /**
     * @var ?WebsiteDnsRecordsTrackingRecord $trackingRecord CNAME record for the company tracking domain, present when the company has one. It is optional and never gates verification or sending; publish it with the other records to brand tracked links. Proxying must be off.
     */
    #[JsonProperty('trackingRecord')]
    public ?WebsiteDnsRecordsTrackingRecord $trackingRecord;

    /**
     * @var ?value-of<WebsiteDnsRecordsTrackingStatus> $trackingStatus Verification status of trackingRecord, including its HTTPS certificate. Informational; it never affects the domain's status.
     */
    #[JsonProperty('trackingStatus')]
    public ?string $trackingStatus;

    /**
     * @param array{
     *   inboundRoutingError?: ?string,
     *   inboundRoutingStatus?: ?value-of<WebsiteDnsRecordsInboundRoutingStatus>,
     *   inboundVerificationRecord?: ?WebsiteDnsRecordsInboundVerificationRecord,
     *   inboundVerificationStatus?: ?value-of<WebsiteDnsRecordsInboundVerificationStatus>,
     *   platformDnsRecords?: ?array<WebsiteDnsRecordsPlatformDnsRecordsItem>,
     *   returnPathCnameDiagnostic?: ?array<string, mixed>,
     *   returnPathCnameRecord?: ?WebsiteDnsRecordsReturnPathCnameRecord,
     *   returnPathCnameStatus?: ?value-of<WebsiteDnsRecordsReturnPathCnameStatus>,
     *   trackingRecord?: ?WebsiteDnsRecordsTrackingRecord,
     *   trackingStatus?: ?value-of<WebsiteDnsRecordsTrackingStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inboundRoutingError = $values['inboundRoutingError'] ?? null;
        $this->inboundRoutingStatus = $values['inboundRoutingStatus'] ?? null;
        $this->inboundVerificationRecord = $values['inboundVerificationRecord'] ?? null;
        $this->inboundVerificationStatus = $values['inboundVerificationStatus'] ?? null;
        $this->platformDnsRecords = $values['platformDnsRecords'] ?? null;
        $this->returnPathCnameDiagnostic = $values['returnPathCnameDiagnostic'] ?? null;
        $this->returnPathCnameRecord = $values['returnPathCnameRecord'] ?? null;
        $this->returnPathCnameStatus = $values['returnPathCnameStatus'] ?? null;
        $this->trackingRecord = $values['trackingRecord'] ?? null;
        $this->trackingStatus = $values['trackingStatus'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
