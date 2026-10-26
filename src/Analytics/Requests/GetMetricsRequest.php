<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\GetMetricsRequestEmailType;
use DateTime;
use Sequenzy\Analytics\Types\GetMetricsRequestOutcome;
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
     * @var ?value-of<GetMetricsRequestOutcome> $outcome Only sends that had this outcome: a permanent bounce, a temporary bounce, a blocked bounce (the receiver refused it over content, policy or reputation) or a spam complaint. Matches the dashboard's Sender Quality cards. Filtered responses report replies as 0 and omit the commerce forecast.
     */
    public ?string $outcome;

    /**
     * @var ?value-of<GetMetricsRequestPeriod> $period Sliding time window. Ignored when start/end are provided.
     */
    public ?string $period;

    /**
     * @var ?string $recipientDomain Recipient domain filter (e.g. gmail.com). Case-insensitive.
     */
    public ?string $recipientDomain;

    /**
     * @var ?string $source Email source filter as `<type>:<id>`: `campaign:<campaignId>`, `sequence:<sequenceId>`, `sequence_step:<email step id>` or `transactional:<transactional email id>`. Responses filtered by recipientDomain or source report replies as 0 and omit the commerce forecast. Returns 404 when the source is not in the company or not visible to the key.
     */
    public ?string $source;

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
     *   outcome?: ?value-of<GetMetricsRequestOutcome>,
     *   period?: ?value-of<GetMetricsRequestPeriod>,
     *   recipientDomain?: ?string,
     *   source?: ?string,
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
        $this->outcome = $values['outcome'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->recipientDomain = $values['recipientDomain'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
