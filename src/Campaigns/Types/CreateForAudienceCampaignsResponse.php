<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateForAudienceCampaignsResponse extends JsonSerializableType
{
    /**
     * @var CreateForAudienceCampaignsResponseAudience $audience
     */
    #[JsonProperty('audience')]
    public CreateForAudienceCampaignsResponseAudience $audience;

    /**
     * @var CreateForAudienceCampaignsResponseCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public CreateForAudienceCampaignsResponseCampaign $campaign;

    /**
     * @param array{
     *   audience: CreateForAudienceCampaignsResponseAudience,
     *   campaign: CreateForAudienceCampaignsResponseCampaign,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'];
        $this->campaign = $values['campaign'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
