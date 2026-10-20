<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class LiveActivityDispatch extends JsonSerializableType
{
    /**
     * @var ?string $activityId
     */
    #[JsonProperty('activityId')]
    public ?string $activityId;

    /**
     * @var ?value-of<LiveActivityDispatchEvent> $event
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?array<string> $jobIds Queued delivery jobs, one per batch of 100 devices.
     */
    #[JsonProperty('jobIds'), ArrayType(['string'])]
    public ?array $jobIds;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $tokenCount Devices the push was queued for. 0 means nothing was sent.
     */
    #[JsonProperty('tokenCount')]
    public ?int $tokenCount;

    /**
     * @param array{
     *   activityId?: ?string,
     *   event?: ?value-of<LiveActivityDispatchEvent>,
     *   jobIds?: ?array<string>,
     *   message?: ?string,
     *   success?: ?bool,
     *   tokenCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activityId = $values['activityId'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->jobIds = $values['jobIds'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->tokenCount = $values['tokenCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
