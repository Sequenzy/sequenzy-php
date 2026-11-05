<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\InApp\Types\RecordInAppEventRequestType;

class RecordInAppEventRequest extends JsonSerializableType
{
    /**
     * @var ?string $buttonId Clicks in custom HTML messages: which control was clicked. Recorded on the first click's in_app.clicked activity.
     */
    #[JsonProperty('buttonId')]
    public ?string $buttonId;

    /**
     * @var value-of<RecordInAppEventRequestType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<RecordInAppEventRequestType>,
     *   buttonId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->buttonId = $values['buttonId'] ?? null;
        $this->type = $values['type'];
    }
}
