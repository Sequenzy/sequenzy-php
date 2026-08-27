<?php

namespace Sequenzy\Analytics\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Analytics\Types\GetRecipientsRequestPeriod;

class GetRecipientsRequest extends JsonSerializableType
{
    /**
     * @var ?string $campaignId Filter to recipients of a specific campaign
     */
    public ?string $campaignId;

    /**
     * @var ?string $email Filter to a single recipient by email address
     */
    public ?string $email;

    /**
     * @var ?DateTime $end End of custom time range (ISO 8601). Must be used with `start`. Max range: 90 days.
     */
    public ?DateTime $end;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events in recipient engagement arrays.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @var ?int $limit Recipients per page (max 100)
     */
    public ?int $limit;

    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @var ?value-of<GetRecipientsRequestPeriod> $period Sliding time window. Ignored when start/end are provided.
     */
    public ?string $period;

    /**
     * @var ?string $sequenceId Filter to recipients of a specific sequence
     */
    public ?string $sequenceId;

    /**
     * @var ?DateTime $start Start of custom time range (ISO 8601). Must be used with `end`.
     */
    public ?DateTime $start;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   email?: ?string,
     *   end?: ?DateTime,
     *   includeMachineEngagement?: ?bool,
     *   limit?: ?int,
     *   page?: ?int,
     *   period?: ?value-of<GetRecipientsRequestPeriod>,
     *   sequenceId?: ?string,
     *   start?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->start = $values['start'] ?? null;
    }
}
