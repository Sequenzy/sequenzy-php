<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\GetMetricsBreakdownRequestBy;
use Sequenzy\Analytics\Types\GetMetricsBreakdownRequestEmailType;
use DateTime;
use Sequenzy\Analytics\Types\GetMetricsBreakdownRequestPeriod;

class GetMetricsBreakdownRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetMetricsBreakdownRequestBy> $by Dimension to group by. `email` has one row per campaign, sequence email step and transactional template.
     */
    public ?string $by;

    /**
     * @var ?value-of<GetMetricsBreakdownRequestEmailType> $emailType Structural email type filter. Marketer-role personal keys only see the emails their role can open and cannot request transactional.
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
     * @var ?int $limit Number of rows to return.
     */
    public ?int $limit;

    /**
     * @var ?string $mailboxProvider Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud).
     */
    public ?string $mailboxProvider;

    /**
     * @var ?value-of<GetMetricsBreakdownRequestPeriod> $period Sliding window over send times. Ignored when start/end are provided.
     */
    public ?string $period;

    /**
     * @var ?string $recipientDomain Recipient domain filter (e.g. gmail.com). Case-insensitive.
     */
    public ?string $recipientDomain;

    /**
     * @var ?string $source Email source filter as `<type>:<id>`: `campaign:<campaignId>`, `sequence:<sequenceId>`, `sequence_step:<email step id>` or `transactional:<transactional email id>`. Returns 404 when the source is not in the company or not visible to the key.
     */
    public ?string $source;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   by?: ?value-of<GetMetricsBreakdownRequestBy>,
     *   emailType?: ?value-of<GetMetricsBreakdownRequestEmailType>,
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   limit?: ?int,
     *   mailboxProvider?: ?string,
     *   period?: ?value-of<GetMetricsBreakdownRequestPeriod>,
     *   recipientDomain?: ?string,
     *   source?: ?string,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->by = $values['by'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->recipientDomain = $values['recipientDomain'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
