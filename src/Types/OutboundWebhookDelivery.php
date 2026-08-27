<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class OutboundWebhookDelivery extends JsonSerializableType
{
    /**
     * @var ?int $attempts
     */
    #[JsonProperty('attempts')]
    public ?int $attempts;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $eventId
     */
    #[JsonProperty('eventId')]
    public ?string $eventId;

    /**
     * @var ?value-of<OutboundWebhookEventType> $eventType
     */
    #[JsonProperty('eventType')]
    public ?string $eventType;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $lastAttemptAt
     */
    #[JsonProperty('lastAttemptAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastAttemptAt;

    /**
     * @var ?string $lastError
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?string $lastResponseBody
     */
    #[JsonProperty('lastResponseBody')]
    public ?string $lastResponseBody;

    /**
     * @var ?int $lastStatusCode
     */
    #[JsonProperty('lastStatusCode')]
    public ?int $lastStatusCode;

    /**
     * @var ?DateTime $nextAttemptAt
     */
    #[JsonProperty('nextAttemptAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextAttemptAt;

    /**
     * @var ?DateTime $queuedAt
     */
    #[JsonProperty('queuedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $queuedAt;

    /**
     * @var ?value-of<OutboundWebhookDeliveryStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   attempts?: ?int,
     *   createdAt?: ?DateTime,
     *   eventId?: ?string,
     *   eventType?: ?value-of<OutboundWebhookEventType>,
     *   id?: ?string,
     *   lastAttemptAt?: ?DateTime,
     *   lastError?: ?string,
     *   lastResponseBody?: ?string,
     *   lastStatusCode?: ?int,
     *   nextAttemptAt?: ?DateTime,
     *   queuedAt?: ?DateTime,
     *   status?: ?value-of<OutboundWebhookDeliveryStatus>,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attempts = $values['attempts'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->eventId = $values['eventId'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastAttemptAt = $values['lastAttemptAt'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->lastResponseBody = $values['lastResponseBody'] ?? null;
        $this->lastStatusCode = $values['lastStatusCode'] ?? null;
        $this->nextAttemptAt = $values['nextAttemptAt'] ?? null;
        $this->queuedAt = $values['queuedAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
