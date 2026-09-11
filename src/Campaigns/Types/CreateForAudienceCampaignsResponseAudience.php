<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class CreateForAudienceCampaignsResponseAudience extends JsonSerializableType
{
    /**
     * @var int $eligibleCount
     */
    #[JsonProperty('eligibleCount')]
    public int $eligibleCount;

    /**
     * @var DateTime $selectedAt
     */
    #[JsonProperty('selectedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $selectedAt;

    /**
     * @var int $selectedCount
     */
    #[JsonProperty('selectedCount')]
    public int $selectedCount;

    /**
     * @var value-of<CreateForAudienceCampaignsResponseAudienceSource> $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @param array{
     *   eligibleCount: int,
     *   selectedAt: DateTime,
     *   selectedCount: int,
     *   source: value-of<CreateForAudienceCampaignsResponseAudienceSource>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eligibleCount = $values['eligibleCount'];
        $this->selectedAt = $values['selectedAt'];
        $this->selectedCount = $values['selectedCount'];
        $this->source = $values['source'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
