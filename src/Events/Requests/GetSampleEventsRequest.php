<?php

namespace Sequenzy\Events\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class GetSampleEventsRequest extends JsonSerializableType
{
    /**
     * @var string $eventName Exact recorded event name, including custom names. Must not be blank.
     */
    public string $eventName;

    /**
     * @param array{
     *   eventName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eventName = $values['eventName'];
    }
}
