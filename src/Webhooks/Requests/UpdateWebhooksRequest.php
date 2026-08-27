<?php

namespace Sequenzy\Webhooks\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\OutboundWebhookEventType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Webhooks\Types\UpdateWebhooksRequestStatus;

class UpdateWebhooksRequest extends JsonSerializableType
{
    /**
     * @var ?array<value-of<OutboundWebhookEventType>> $events
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<UpdateWebhooksRequestStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   events?: ?array<value-of<OutboundWebhookEventType>>,
     *   name?: ?string,
     *   status?: ?value-of<UpdateWebhooksRequestStatus>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->events = $values['events'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
