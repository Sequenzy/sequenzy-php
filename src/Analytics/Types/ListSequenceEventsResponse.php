<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\EmailEvent;
use Sequenzy\Types\Pagination;

class ListSequenceEventsResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $automationNodeIds
     */
    #[JsonProperty('automationNodeIds'), ArrayType(['string'])]
    public ?array $automationNodeIds;

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
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   automationNodeIds?: ?array<string>,
     *   events?: ?array<EmailEvent>,
     *   eventTypes?: ?array<string>,
     *   pagination?: ?Pagination,
     *   sequenceId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automationNodeIds = $values['automationNodeIds'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->eventTypes = $values['eventTypes'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
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
