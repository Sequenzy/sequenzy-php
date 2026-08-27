<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class OutboundWebhookDeliveryAttempt extends JsonSerializableType
{
    /**
     * @var ?int $attemptNumber
     */
    #[JsonProperty('attemptNumber')]
    public ?int $attemptNumber;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?int $durationMs
     */
    #[JsonProperty('durationMs')]
    public ?int $durationMs;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $responseBody
     */
    #[JsonProperty('responseBody')]
    public ?string $responseBody;

    /**
     * @var ?value-of<OutboundWebhookDeliveryAttemptStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $statusCode
     */
    #[JsonProperty('statusCode')]
    public ?int $statusCode;

    /**
     * @param array{
     *   attemptNumber?: ?int,
     *   createdAt?: ?DateTime,
     *   durationMs?: ?int,
     *   error?: ?string,
     *   id?: ?string,
     *   responseBody?: ?string,
     *   status?: ?value-of<OutboundWebhookDeliveryAttemptStatus>,
     *   statusCode?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attemptNumber = $values['attemptNumber'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->durationMs = $values['durationMs'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->responseBody = $values['responseBody'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->statusCode = $values['statusCode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
