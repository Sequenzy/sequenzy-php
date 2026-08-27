<?php

namespace Sequenzy\Webhooks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\OutboundWebhookDelivery;
use Sequenzy\Core\Json\JsonProperty;

class ReplayDeliveryWebhooksResponse extends JsonSerializableType
{
    /**
     * @var ?OutboundWebhookDelivery $delivery
     */
    #[JsonProperty('delivery')]
    public ?OutboundWebhookDelivery $delivery;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   delivery?: ?OutboundWebhookDelivery,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->delivery = $values['delivery'] ?? null;
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
