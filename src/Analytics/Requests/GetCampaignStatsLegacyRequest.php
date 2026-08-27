<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Analytics\Types\GetCampaignStatsLegacyRequestPeriod;

class GetCampaignStatsLegacyRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?string $mailboxProvider Recipient mailbox provider filter (e.g. gmail, microsoft, yahoo, icloud). Scopes engagement metrics to recipients of that provider. Provider-filtered responses report replies, conversions, and revenue as 0 because those metrics cannot be segmented per provider.
     */
    public ?string $mailboxProvider;

    /**
     * @var ?value-of<GetCampaignStatsLegacyRequestPeriod> $period Sliding time window. Ignored when `start` and `end` are provided.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   mailboxProvider?: ?string,
     *   period?: ?value-of<GetCampaignStatsLegacyRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->end = $values['end'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->mailboxProvider = $values['mailboxProvider'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
