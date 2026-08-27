<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class IntegrationActivityEntry extends JsonSerializableType
{
    /**
     * @var ?string $action
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $email The contact the event was matched to, or null when none could be resolved.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $eventType
     */
    #[JsonProperty('eventType')]
    public ?string $eventType;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $integrationId
     */
    #[JsonProperty('integrationId')]
    public ?string $integrationId;

    /**
     * @var ?string $jobId
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?DateTime $processedAt
     */
    #[JsonProperty('processedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $processedAt;

    /**
     * @var ?string $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $providerEventId
     */
    #[JsonProperty('providerEventId')]
    public ?string $providerEventId;

    /**
     * @var ?DateTime $receivedAt
     */
    #[JsonProperty('receivedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $receivedAt;

    /**
     * @var ?array<string, mixed> $requestPayload Sanitized provider request metadata captured for diagnosis.
     */
    #[JsonProperty('requestPayload'), ArrayType(['string' => 'mixed'])]
    public ?array $requestPayload;

    /**
     * @var ?array<string, mixed> $responsePayload Sanitized processing result metadata captured for diagnosis.
     */
    #[JsonProperty('responsePayload'), ArrayType(['string' => 'mixed'])]
    public ?array $responsePayload;

    /**
     * @var ?string $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?value-of<IntegrationActivityEntryStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @param array{
     *   action?: ?string,
     *   createdAt?: ?DateTime,
     *   email?: ?string,
     *   error?: ?string,
     *   eventType?: ?string,
     *   expiresAt?: ?DateTime,
     *   externalId?: ?string,
     *   id?: ?string,
     *   integrationId?: ?string,
     *   jobId?: ?string,
     *   message?: ?string,
     *   processedAt?: ?DateTime,
     *   provider?: ?string,
     *   providerEventId?: ?string,
     *   receivedAt?: ?DateTime,
     *   requestPayload?: ?array<string, mixed>,
     *   responsePayload?: ?array<string, mixed>,
     *   source?: ?string,
     *   status?: ?value-of<IntegrationActivityEntryStatus>,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->integrationId = $values['integrationId'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->processedAt = $values['processedAt'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->providerEventId = $values['providerEventId'] ?? null;
        $this->receivedAt = $values['receivedAt'] ?? null;
        $this->requestPayload = $values['requestPayload'] ?? null;
        $this->responsePayload = $values['responsePayload'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
