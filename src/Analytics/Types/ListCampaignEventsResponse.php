<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailEvent;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\Pagination;

class ListCampaignEventsResponse extends JsonSerializableType
{
    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?array<EmailEvent> $events
     */
    #[JsonProperty('events'), ArrayType([EmailEvent::class])]
    public ?array $events;

    /**
     * @var ?array<string> $eventTypes
     */
    #[JsonProperty('eventTypes'), ArrayType(['string'])]
    public ?array $eventTypes;

    /**
     * @var ?Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?Pagination $pagination;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   events?: ?array<EmailEvent>,
     *   eventTypes?: ?array<string>,
     *   pagination?: ?Pagination,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->eventTypes = $values['eventTypes'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
