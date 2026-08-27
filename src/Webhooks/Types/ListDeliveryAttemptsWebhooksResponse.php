<?php

namespace Sequenzy\Webhooks\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\OutboundWebhookDeliveryAttempt;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListDeliveryAttemptsWebhooksResponse extends JsonSerializableType
{
    /**
     * @var ?array<OutboundWebhookDeliveryAttempt> $attempts
     */
    #[JsonProperty('attempts'), ArrayType([OutboundWebhookDeliveryAttempt::class])]
    public ?array $attempts;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   attempts?: ?array<OutboundWebhookDeliveryAttempt>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attempts = $values['attempts'] ?? null;
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
