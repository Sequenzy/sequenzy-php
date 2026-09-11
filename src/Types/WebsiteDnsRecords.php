<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The DNS records to publish and their per-record verification status. Custom reply routing is independent of sending readiness. GET returns stored results; POST verify performs a fresh check.
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
     * @param array{
     *   inboundRoutingError?: ?string,
     *   inboundRoutingStatus?: ?value-of<WebsiteDnsRecordsInboundRoutingStatus>,
     *   inboundVerificationRecord?: ?WebsiteDnsRecordsInboundVerificationRecord,
     *   inboundVerificationStatus?: ?value-of<WebsiteDnsRecordsInboundVerificationStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inboundRoutingError = $values['inboundRoutingError'] ?? null;
        $this->inboundRoutingStatus = $values['inboundRoutingStatus'] ?? null;
        $this->inboundVerificationRecord = $values['inboundVerificationRecord'] ?? null;
        $this->inboundVerificationStatus = $values['inboundVerificationStatus'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
