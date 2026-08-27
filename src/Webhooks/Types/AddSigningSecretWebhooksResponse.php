<?php

namespace Sequenzy\Webhooks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\OutboundWebhookEndpoint;

class AddSigningSecretWebhooksResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?OutboundWebhookEndpoint $webhook
     */
    #[JsonProperty('webhook')]
    public ?OutboundWebhookEndpoint $webhook;

    /**
     * @param array{
     *   success?: ?bool,
     *   webhook?: ?OutboundWebhookEndpoint,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->webhook = $values['webhook'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
