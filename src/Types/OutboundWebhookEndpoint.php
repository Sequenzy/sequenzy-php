<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class OutboundWebhookEndpoint extends JsonSerializableType
{
    /**
     * @var ?DateTime $circuitOpenedAt
     */
    #[JsonProperty('circuitOpenedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $circuitOpenedAt;

    /**
     * @var ?DateTime $circuitOpenUntil
     */
    #[JsonProperty('circuitOpenUntil'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $circuitOpenUntil;

    /**
     * @var ?int $consecutiveFailures Consecutive failed delivery attempts used for endpoint backoff.
     */
    #[JsonProperty('consecutiveFailures')]
    public ?int $consecutiveFailures;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?array<value-of<OutboundWebhookEventType>> $events
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $lastFailureAt
     */
    #[JsonProperty('lastFailureAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastFailureAt;

    /**
     * @var ?DateTime $lastSuccessAt
     */
    #[JsonProperty('lastSuccessAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSuccessAt;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $signingSecret Returned only when creating a webhook or adding a signing secret.
     */
    #[JsonProperty('signingSecret')]
    public ?string $signingSecret;

    /**
     * @var ?array<OutboundWebhookEndpointSigningSecretsItem> $signingSecrets Active signing secret metadata. Secret values are returned only once.
     */
    #[JsonProperty('signingSecrets'), ArrayType([OutboundWebhookEndpointSigningSecretsItem::class])]
    public ?array $signingSecrets;

    /**
     * @var ?value-of<OutboundWebhookEndpointStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   circuitOpenedAt?: ?DateTime,
     *   circuitOpenUntil?: ?DateTime,
     *   consecutiveFailures?: ?int,
     *   createdAt?: ?DateTime,
     *   events?: ?array<value-of<OutboundWebhookEventType>>,
     *   id?: ?string,
     *   lastFailureAt?: ?DateTime,
     *   lastSuccessAt?: ?DateTime,
     *   name?: ?string,
     *   signingSecret?: ?string,
     *   signingSecrets?: ?array<OutboundWebhookEndpointSigningSecretsItem>,
     *   status?: ?value-of<OutboundWebhookEndpointStatus>,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->circuitOpenedAt = $values['circuitOpenedAt'] ?? null;
        $this->circuitOpenUntil = $values['circuitOpenUntil'] ?? null;
        $this->consecutiveFailures = $values['consecutiveFailures'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastFailureAt = $values['lastFailureAt'] ?? null;
        $this->lastSuccessAt = $values['lastSuccessAt'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->signingSecret = $values['signingSecret'] ?? null;
        $this->signingSecrets = $values['signingSecrets'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
