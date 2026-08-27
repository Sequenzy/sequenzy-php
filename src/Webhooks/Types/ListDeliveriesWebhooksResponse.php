<?php

namespace Sequenzy\Webhooks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\OutboundWebhookDelivery;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListDeliveriesWebhooksResponse extends JsonSerializableType
{
    /**
     * @var ?array<OutboundWebhookDelivery> $deliveries
     */
    #[JsonProperty('deliveries'), ArrayType([OutboundWebhookDelivery::class])]
    public ?array $deliveries;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   deliveries?: ?array<OutboundWebhookDelivery>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deliveries = $values['deliveries'] ?? null;
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
