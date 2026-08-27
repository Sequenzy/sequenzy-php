<?php

namespace Sequenzy\Webhooks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\OutboundWebhookDelivery;
use Sequenzy\Core\Json\JsonProperty;

class TestWebhooksResponse extends JsonSerializableType
{
    /**
     * @var ?OutboundWebhookDelivery $delivery
     */
    #[JsonProperty('delivery')]
    public ?OutboundWebhookDelivery $delivery;

    /**
     * @var ?string $eventId
     */
    #[JsonProperty('eventId')]
    public ?string $eventId;

    /**
     * @var ?int $queuedDeliveries
     */
    #[JsonProperty('queuedDeliveries')]
    public ?int $queuedDeliveries;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   delivery?: ?OutboundWebhookDelivery,
     *   eventId?: ?string,
     *   queuedDeliveries?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->delivery = $values['delivery'] ?? null;
        $this->eventId = $values['eventId'] ?? null;
        $this->queuedDeliveries = $values['queuedDeliveries'] ?? null;
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
