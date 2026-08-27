<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Analytics\Types\ListEmailMetricsRequestEmailType;
use DateTime;
use Sequenzy\Analytics\Types\ListEmailMetricsRequestOrder;
use Sequenzy\Analytics\Types\ListEmailMetricsRequestPeriod;
use Sequenzy\Analytics\Types\ListEmailMetricsRequestSort;

class ListEmailMetricsRequest extends JsonSerializableType
{
    /**
     * @var ?string $campaignId Comma-separated campaign IDs to restrict the breakdown to. Cannot be combined with sequenceId, step, or emailType=sequence.
     */
    public ?string $campaignId;

    /**
     * @var ?value-of<ListEmailMetricsRequestEmailType> $emailType Restrict to campaigns or sequence emails. Defaults to both. Implied as sequence when sequenceId or step is set, and as campaign when campaignId is set.
     */
    public ?string $emailType;

    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events in engagement metrics.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?int $limit Emails per page.
     */
    public ?int $limit;

    /**
     * @var ?value-of<ListEmailMetricsRequestOrder> $order Sort order.
     */
    public ?string $order;

    /**
     * @var ?int $page Page number.
     */
    public ?int $page;

    /**
     * @var ?value-of<ListEmailMetricsRequestPeriod> $period Sliding time window. Ignored when start/end are provided. Omit both for all-time counts.
     */
    public ?string $period;

    /**
     * @var ?string $sequenceId Comma-separated sequence IDs to restrict the breakdown to. Cannot be combined with campaignId or emailType=campaign.
     */
    public ?string $sequenceId;

    /**
     * @var ?value-of<ListEmailMetricsRequestSort> $sort Sort field.
     */
    public ?string $sort;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @var ?int $step Keep only sequence emails at this 1-based position, counted in graph order per sequence. Cannot be combined with emailType=campaign.
     */
    public ?int $step;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   emailType?: ?value-of<ListEmailMetricsRequestEmailType>,
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   limit?: ?int,
     *   order?: ?value-of<ListEmailMetricsRequestOrder>,
     *   page?: ?int,
     *   period?: ?value-of<ListEmailMetricsRequestPeriod>,
     *   sequenceId?: ?string,
     *   sort?: ?value-of<ListEmailMetricsRequestSort>,
     *   start?: ?DateTime,
     *   step?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->start = $values['start'] ?? null;
        $this->step = $values['step'] ?? null;
    }
}
