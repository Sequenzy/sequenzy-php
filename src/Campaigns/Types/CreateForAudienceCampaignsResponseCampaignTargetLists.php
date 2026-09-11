<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateForAudienceCampaignsResponseCampaignTargetLists extends JsonSerializableType
{
    /**
     * @var array<mixed> $include
     */
    #[JsonProperty('include'), ArrayType(['mixed'])]
    public array $include;

    /**
     * @var array<string> $includedSubscriberIds
     */
    #[JsonProperty('includedSubscriberIds'), ArrayType(['string'])]
    public array $includedSubscriberIds;

    /**
     * @var value-of<CreateForAudienceCampaignsResponseCampaignTargetListsType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   include: array<mixed>,
     *   includedSubscriberIds: array<string>,
     *   type: value-of<CreateForAudienceCampaignsResponseCampaignTargetListsType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->include = $values['include'];
        $this->includedSubscriberIds = $values['includedSubscriberIds'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
