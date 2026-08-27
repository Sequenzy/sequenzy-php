<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class NotificationPreference extends JsonSerializableType
{
    /**
     * @var value-of<NotificationPreferenceEvent> $event Which notification to configure.
     */
    #[JsonProperty('event')]
    public string $event;

    /**
     * @var value-of<NotificationPreferenceMode> $mode How to receive it. "instant" sends one email per occurrence, "daily" one summary per day. Instant form_submitted notifications stop after 50 per workspace per UTC day. "daily" is not supported for form_submitted or campaign_completed.
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @param array{
     *   event: value-of<NotificationPreferenceEvent>,
     *   mode: value-of<NotificationPreferenceMode>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->event = $values['event'];
        $this->mode = $values['mode'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
