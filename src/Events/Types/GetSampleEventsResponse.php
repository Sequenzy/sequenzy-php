<?php

namespace Sequenzy\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetSampleEventsResponse extends JsonSerializableType
{
    /**
     * @var string $eventName
     */
    #[JsonProperty('eventName')]
    public string $eventName;

    /**
     * @var ?GetSampleEventsResponseSample $sample
     */
    #[JsonProperty('sample')]
    public ?GetSampleEventsResponseSample $sample;

    /**
     * @param array{
     *   eventName: string,
     *   sample?: ?GetSampleEventsResponseSample,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventName = $values['eventName'];
        $this->sample = $values['sample'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
