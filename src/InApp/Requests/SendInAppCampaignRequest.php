<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

class SendInAppCampaignRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $scheduledAt Future ISO 8601 time to go live. Omit or pass null to launch now.
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
