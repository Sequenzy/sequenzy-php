<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class NotificationPreference extends JsonSerializableType
{
    /**
     * @var value-of<NotificationPreferenceEvent> $event Which notification to configure. weekly_report is the Monday summary of last week's sends, engagement, new subscribers, revenue, goals, and sequence trends; it is on by default and only sent for weeks with more than 10 emails sent.
     */
    #[JsonProperty('event')]
    public string $event;

    /**
     * @var value-of<NotificationPreferenceMode> $mode How to receive it. "instant" sends one email per occurrence, "daily" one summary per day, "weekly" one report per week. Instant form_submitted notifications stop after 50 per workspace per UTC day. "daily" is not supported for form_submitted or campaign_completed; weekly_report accepts only "off" or "weekly".
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
