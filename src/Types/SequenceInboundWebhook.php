<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class SequenceInboundWebhook extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $eventName
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?SequenceInboundWebhookFieldMapping $fieldMapping
     */
    #[JsonProperty('fieldMapping')]
    public ?SequenceInboundWebhookFieldMapping $fieldMapping;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $sampleCapturedAt
     */
    #[JsonProperty('sampleCapturedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sampleCapturedAt;

    /**
     * @var ?array<string, mixed> $samplePayload
     */
    #[JsonProperty('samplePayload'), ArrayType(['string' => 'mixed'])]
    public ?array $samplePayload;

    /**
     * @var ?string $secret Secret URL token. Treat it as a credential.
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @var ?value-of<SequenceInboundWebhookStatus> $status
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
     *   createdAt?: ?DateTime,
     *   eventName?: ?string,
     *   fieldMapping?: ?SequenceInboundWebhookFieldMapping,
     *   id?: ?string,
     *   sampleCapturedAt?: ?DateTime,
     *   samplePayload?: ?array<string, mixed>,
     *   secret?: ?string,
     *   status?: ?value-of<SequenceInboundWebhookStatus>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->fieldMapping = $values['fieldMapping'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->sampleCapturedAt = $values['sampleCapturedAt'] ?? null;
        $this->samplePayload = $values['samplePayload'] ?? null;
        $this->secret = $values['secret'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
