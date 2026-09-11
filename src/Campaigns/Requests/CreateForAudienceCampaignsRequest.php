<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Campaigns\Types\CreateForAudienceCampaignsRequestSelection;

class CreateForAudienceCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var CreateForAudienceCampaignsRequestSelection $selection
     */
    #[JsonProperty('selection')]
    public CreateForAudienceCampaignsRequestSelection $selection;

    /**
     * @param array{
     *   selection: CreateForAudienceCampaignsRequestSelection,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->selection = $values['selection'];
    }
}
