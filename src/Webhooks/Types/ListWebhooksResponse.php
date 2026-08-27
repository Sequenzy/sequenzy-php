<?php

namespace Sequenzy\Webhooks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\OutboundWebhookEndpoint;
use Sequenzy\Core\Types\ArrayType;

class ListWebhooksResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<OutboundWebhookEndpoint> $webhooks
     */
    #[JsonProperty('webhooks'), ArrayType([OutboundWebhookEndpoint::class])]
    public ?array $webhooks;

    /**
     * @param array{
     *   success?: ?bool,
     *   webhooks?: ?array<OutboundWebhookEndpoint>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->webhooks = $values['webhooks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
