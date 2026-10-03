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
     * @param array{
     *   scheduledAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scheduledAt = $values['scheduledAt'] ?? null;
    }
}
