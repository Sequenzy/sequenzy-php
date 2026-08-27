<?php

namespace Sequenzy\Webhooks\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\OutboundWebhookEventType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateWebhooksRequest extends JsonSerializableType
{
    /**
     * @var ?array<value-of<OutboundWebhookEventType>> $events Omit to subscribe to default email and SMS lifecycle events plus subscriber.invalid, subscriber.created, and subscriber.unsubscribed. Add campaign.sent, email.opened, email.clicked, email.replied, subscriber.updated, subscriber.list_subscribed, subscriber.list_unsubscribed, sequence.finished, and sequence.failed explicitly for aggregate campaign completion, engagement, inbound reply, profile sync, per-list consent sync, or sequence lifecycle events. SMS events (sms.sent, sms.delivered, sms.failed, sms.opted_out) are included in the defaults.
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   name: string,
     *   url: string,
     *   events?: ?array<value-of<OutboundWebhookEventType>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->events = $values['events'] ?? null;
        $this->name = $values['name'];
        $this->url = $values['url'];
    }
}
