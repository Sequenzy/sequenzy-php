<?php

namespace Sequenzy\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetSampleEventsResponseSample extends JsonSerializableType
{
    /**
     * @var string $eventTime UTC event timestamp
     */
    #[JsonProperty('eventTime')]
    public string $eventTime;

    /**
     * @var array<string, mixed> $properties Recorded payload, preserving nested JSON; may be empty
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public array $properties;

    /**
     * @var string $subscriberId Source subscriber ID; may differ from your test recipient
     */
    #[JsonProperty('subscriberId')]
    public string $subscriberId;

    /**
     * @param array{
     *   eventTime: string,
     *   properties: array<string, mixed>,
     *   subscriberId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventTime = $values['eventTime'];
        $this->properties = $values['properties'];
        $this->subscriberId = $values['subscriberId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
