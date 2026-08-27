<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceInboundWebhook;

class RotateInboundWebhookSecretSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?SequenceInboundWebhook $webhook
     */
    #[JsonProperty('webhook')]
    public ?SequenceInboundWebhook $webhook;

    /**
     * @param array{
     *   success?: ?bool,
     *   webhook?: ?SequenceInboundWebhook,
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
