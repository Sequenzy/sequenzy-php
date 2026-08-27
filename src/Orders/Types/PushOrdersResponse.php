<?php

namespace Sequenzy\Orders\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PushOrdersResponse extends JsonSerializableType
{
    /**
     * @var ?string $jobId
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?string $orderId
     */
    #[JsonProperty('orderId')]
    public ?string $orderId;

    /**
     * @var ?bool $queued
     */
    #[JsonProperty('queued')]
    public ?bool $queued;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   jobId?: ?string,
     *   orderId?: ?string,
     *   queued?: ?bool,
     *   status?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->jobId = $values['jobId'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->queued = $values['queued'] ?? null;
        $this->status = $values['status'] ?? null;
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
