<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\GetEmailClientMetricsRequestEmailType;
use DateTime;
use Sequenzy\Analytics\Types\GetEmailClientMetricsRequestPeriod;

class GetEmailClientMetricsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetEmailClientMetricsRequestEmailType> $emailType Structural email type filter. Marketer-role personal keys see campaign and sequence email only and cannot request transactional.
     */
    public ?string $emailType;

    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset opens.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?string $mailboxProvider Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud).
     */
    public ?string $mailboxProvider;

    /**
     * @var ?value-of<GetEmailClientMetricsRequestPeriod> $period Sliding window over open times. Ignored when start/end are provided.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   emailType?: ?value-of<GetEmailClientMetricsRequestEmailType>,
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   mailboxProvider?: ?string,
     *   period?: ?value-of<GetEmailClientMetricsRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailType = $values['emailType'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
