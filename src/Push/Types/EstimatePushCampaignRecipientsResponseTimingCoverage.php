<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Present when includeTimingCoverage is true.
 */
class EstimatePushCampaignRecipientsResponseTimingCoverage extends JsonSerializableType
{
    /**
     * @var ?int $eligible Contacts that would receive the campaign.
     */
    #[JsonProperty('eligible')]
    public ?int $eligible;

    /**
     * @var ?int $withPushHistory Eligible contacts with at least 3 push clicks in the last 90 days. The rest use their email open hour, the workspace's usual push hour, or the start.
     */
    #[JsonProperty('withPushHistory')]
    public ?int $withPushHistory;

    /**
     * @var ?int $withTimezone Eligible contacts with a known device or contact timezone. The rest get a local-time campaign at scheduledAt.
     */
    #[JsonProperty('withTimezone')]
    public ?int $withTimezone;

    /**
     * @param array{
     *   eligible?: ?int,
     *   withPushHistory?: ?int,
     *   withTimezone?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eligible = $values['eligible'] ?? null;
        $this->withPushHistory = $values['withPushHistory'] ?? null;
        $this->withTimezone = $values['withTimezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
