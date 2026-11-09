<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

class SendPushCampaignRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $scheduledAt Future ISO 8601 time. Omit or null to send immediately.
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?string $scheduledTimezone IANA timezone the scheduled wall-clock time refers to, for example America/New_York. null clears it.
     */
    #[JsonProperty('scheduledTimezone')]
    public ?string $scheduledTimezone;

    /**
     * @var ?bool $sendInRecipientTimezone Deliver scheduledAt's wall-clock time in each contact's own timezone, using the timezone the contact's most recently seen active device reported, else the contact's timezone attribute. Needs scheduledAt and scheduledTimezone when sending. Contacts whose local time has already passed get the push right away; contacts with no known timezone get it at scheduledAt. Delivery starts where the wall time first occurs (UTC+14), so a campaign can stay sending for about 26 hours. Enabling it turns sendTimeOptimization off; omit to keep the saved value.
     */
    #[JsonProperty('sendInRecipientTimezone')]
    public ?bool $sendInRecipientTimezone;

    /**
     * @var ?bool $sendTimeOptimization Send each contact the push at their most engaged UTC hour within sendTimeWindowHours of the start (now, or scheduledAt). The hour is their most-clicked push hour over the last 90 days (at least 3 clicks), else their most-opened email hour, else the workspace's most-clicked push hour (once it has at least 20 clicks in the last 90 days), else the start. Enabling it turns sendInRecipientTimezone off; passing both as true returns 400. Omit to keep the saved value.
     */
    #[JsonProperty('sendTimeOptimization')]
    public ?bool $sendTimeOptimization;

    /**
     * @var ?int $sendTimeWindowHours Hours after the start in which optimized sends may land. Omit to keep the saved value, which is 12 if never set.
     */
    #[JsonProperty('sendTimeWindowHours')]
    public ?int $sendTimeWindowHours;

    /**
     * @param array{
     *   scheduledAt?: ?DateTime,
     *   scheduledTimezone?: ?string,
     *   sendInRecipientTimezone?: ?bool,
     *   sendTimeOptimization?: ?bool,
     *   sendTimeWindowHours?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->scheduledTimezone = $values['scheduledTimezone'] ?? null;
        $this->sendInRecipientTimezone = $values['sendInRecipientTimezone'] ?? null;
        $this->sendTimeOptimization = $values['sendTimeOptimization'] ?? null;
        $this->sendTimeWindowHours = $values['sendTimeWindowHours'] ?? null;
    }
}
