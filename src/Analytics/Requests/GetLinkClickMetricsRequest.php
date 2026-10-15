<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\GetLinkClickMetricsRequestEmailType;
use DateTime;
use Sequenzy\Analytics\Types\GetLinkClickMetricsRequestPeriod;

class GetLinkClickMetricsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetLinkClickMetricsRequestEmailType> $emailType Structural email type filter. Marketer-role personal keys see links from the campaigns and sequence emails their role can open, and cannot request transactional.
     */
    public ?string $emailType;

    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner and link-preview clicks.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?int $limit Number of destinations to return.
     */
    public ?int $limit;

    /**
     * @var ?string $mailboxProvider Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud).
     */
    public ?string $mailboxProvider;

    /**
     * @var ?value-of<GetLinkClickMetricsRequestPeriod> $period Sliding window over click times. Ignored when start/end are provided.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   emailType?: ?value-of<GetLinkClickMetricsRequestEmailType>,
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   limit?: ?int,
     *   mailboxProvider?: ?string,
     *   period?: ?value-of<GetLinkClickMetricsRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailType = $values['emailType'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
