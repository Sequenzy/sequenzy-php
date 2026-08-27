<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Analytics\Types\ListCampaignEventsRequestEventType;
use Sequenzy\Analytics\Types\ListCampaignEventsRequestPeriod;

class ListCampaignEventsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?value-of<ListCampaignEventsRequestEventType> $eventType Single event type to include. Defaults to delivery when no event type filter is provided.
     */
    public ?string $eventType;

    /**
     * @var ?string $eventTypes Comma-separated event types to include. Supported values are send, delivery, bounce, complaint, open, click, unsubscribe, delivery_delay, and transport_failure.
     */
    public ?string $eventTypes;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events when requesting engagement event types.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?int $limit Events per page (max 500)
     */
    public ?int $limit;

    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @var ?value-of<ListCampaignEventsRequestPeriod> $period Sliding time window. Ignored when `start` and `end` are provided.
     */
    public ?string $period;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   end?: ?DateTime,
     *   eventType?: ?value-of<ListCampaignEventsRequestEventType>,
     *   eventTypes?: ?string,
     *   includeMachineEngagement?: ?bool,
     *   limit?: ?int,
     *   page?: ?int,
     *   period?: ?value-of<ListCampaignEventsRequestPeriod>,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->end = $values['end'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->eventTypes = $values['eventTypes'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
