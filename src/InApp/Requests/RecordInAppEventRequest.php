<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\InApp\Types\RecordInAppEventRequestPushPermission;
use Sequenzy\InApp\Types\RecordInAppEventRequestType;

class RecordInAppEventRequest extends JsonSerializableType
{
    /**
     * @var ?string $buttonId Clicks in custom HTML messages: which control was clicked. Recorded on the first click's in_app.clicked activity.
     */
    #[JsonProperty('buttonId')]
    public ?string $buttonId;

    /**
     * @var ?value-of<RecordInAppEventRequestPushPermission> $pushPermission With type clicked on an item that has a request_push_permission button: the notification permission your app read after asking. The first result is kept for the step's stats and written to the contact's pushPermission attribute; ignored otherwise.
     */
    #[JsonProperty('pushPermission')]
    public ?string $pushPermission;

    /**
     * @var value-of<RecordInAppEventRequestType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<RecordInAppEventRequestType>,
     *   buttonId?: ?string,
     *   pushPermission?: ?value-of<RecordInAppEventRequestPushPermission>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->buttonId = $values['buttonId'] ?? null;
        $this->pushPermission = $values['pushPermission'] ?? null;
        $this->type = $values['type'];
    }
}
