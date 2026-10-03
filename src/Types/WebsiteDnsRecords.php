<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * The DNS records and their per-record verification status. Publish the DKIM record, DMARC when present, and the bounce records described by bounceRecords (returnPathCnameRecord when bounceRecords.style is cname, otherwise spfRecord and mxRecord; never both at the same name). Custom reply routing is independent of sending readiness. GET returns stored results; POST verify performs a fresh check.
 */
class WebsiteDnsRecords extends JsonSerializableType
{
    /**
     * @var ?string $inboundRoutingError Last reply-routing error and recovery instruction. Null when there is no stored error; omitted when no inbound MX record exists. Retry verification after correcting DNS or a temporary provider failure.
     */
    #[JsonProperty('inboundRoutingError')]
    public ?string $inboundRoutingError;

    /**
     * @var ?value-of<WebsiteDnsRecordsInboundRoutingStatus> $inboundRoutingStatus Customer-facing reply readiness from stored checks, returned when an inbound MX record exists. SES routes require verified MX, receiving ownership, and an active receiving rule. Unchecked legacy SES routes display pending; retained MTA reply routes keep their existing status. Inconclusive ownership checks preserve the underlying route and previously confirmed ownership, with an error for retry.
     */
    #[JsonProperty('inboundRoutingStatus')]
    public ?string $inboundRoutingStatus;

    /**
     * @var ?WebsiteDnsRecordsInboundVerificationRecord $inboundVerificationRecord Optional public TXT record for an existing reply hostname outside its verified sending domain. Verification prepares this after the inbound MX verifies. Publish the exact value at the fully qualified name, then verify again. Absence can mean verification is already covered, preparation has not run, or preparation failed; inspect inboundRoutingStatus/error. This generated field cannot be set or cleared through the website API.
     */
    #[JsonProperty('inboundVerificationRecord')]
    public ?WebsiteDnsRecordsInboundVerificationRecord $inboundVerificationRecord;

    /**
     * @var ?value-of<WebsiteDnsRecordsInboundVerificationStatus> $inboundVerificationStatus Stored receiving-domain ownership status, absent before it has been checked. Pending is not active routing. Existing sending-domain verification can satisfy ownership without an additional TXT record.
     */
    #[JsonProperty('inboundVerificationStatus')]
    public ?string $inboundVerificationStatus;

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
