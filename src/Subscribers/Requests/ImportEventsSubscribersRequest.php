<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Subscribers\Types\ImportEventsSubscribersRequestEventsItem;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ImportEventsSubscribersRequest extends JsonSerializableType
{
    /**
     * @var array<ImportEventsSubscribersRequestEventsItem> $events Events to record. Each event identifies its own subscriber.
     */
    #[JsonProperty('events'), ArrayType([ImportEventsSubscribersRequestEventsItem::class])]
    public array $events;

    /**
     * @param array{
     *   events: array<ImportEventsSubscribersRequestEventsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->events = $values['events'];
    }
}
