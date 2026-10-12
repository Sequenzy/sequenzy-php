<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\InApp\Types\RecordInAppEventRequestType;
use Sequenzy\Core\Json\JsonProperty;

class RecordInAppEventRequest extends JsonSerializableType
{
    /**
     * @var value-of<RecordInAppEventRequestType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<RecordInAppEventRequestType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
    }
}
