<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EstimatePushCampaignRecipientsResponse extends JsonSerializableType
{
    /**
     * @var ?int $audienceCount
     */
    #[JsonProperty('audienceCount')]
    public ?int $audienceCount;

    /**
     * @var ?int $eligibleCount
     */
    #[JsonProperty('eligibleCount')]
    public ?int $eligibleCount;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?EstimatePushCampaignRecipientsResponseTimingCoverage $timingCoverage Present when includeTimingCoverage is true.
     */
    #[JsonProperty('timingCoverage')]
    public ?EstimatePushCampaignRecipientsResponseTimingCoverage $timingCoverage;

    /**
     * @param array{
     *   audienceCount?: ?int,
     *   eligibleCount?: ?int,
     *   success?: ?bool,
     *   timingCoverage?: ?EstimatePushCampaignRecipientsResponseTimingCoverage,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceCount = $values['audienceCount'] ?? null;
        $this->eligibleCount = $values['eligibleCount'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->timingCoverage = $values['timingCoverage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
