<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\GetMetricsRequestEmailType;
use DateTime;
use Sequenzy\Analytics\Types\GetMetricsRequestPeriod;

class GetMetricsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetMetricsRequestEmailType> $emailType Structural email type filter. Use transactional for Send API and transactional SMTP traffic.
     */
    public ?string $emailType;

    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?string $mailboxProvider Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud). Scopes engagement metrics to recipients of that provider. Provider-filtered responses report replies as 0 (replies cannot be segmented per provider) and omit the commerce forecast.
     */
    public ?string $mailboxProvider;

    /**
     * @var ?value-of<GetMetricsRequestPeriod> $period Sliding time window. Ignored when start/end are provided.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   emailType?: ?value-of<GetMetricsRequestEmailType>,
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   mailboxProvider?: ?string,
     *   period?: ?value-of<GetMetricsRequestPeriod>,
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
