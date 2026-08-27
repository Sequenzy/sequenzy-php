<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceInboundWebhookFieldMapping;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ConfigureInboundWebhookSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?SequenceInboundWebhookFieldMapping $fieldMapping
     */
    #[JsonProperty('fieldMapping')]
    public ?SequenceInboundWebhookFieldMapping $fieldMapping;

    /**
     * @var ?array<string, mixed> $samplePayload
     */
    #[JsonProperty('samplePayload'), ArrayType(['string' => 'mixed'])]
    public ?array $samplePayload;

    /**
     * @param array{
     *   fieldMapping?: ?SequenceInboundWebhookFieldMapping,
     *   samplePayload?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fieldMapping = $values['fieldMapping'] ?? null;
        $this->samplePayload = $values['samplePayload'] ?? null;
    }
}
