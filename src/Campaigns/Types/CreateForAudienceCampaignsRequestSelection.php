<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateForAudienceCampaignsRequestSelection extends JsonSerializableType
{
    /**
     * @var ?CreateForAudienceCampaignsRequestSelectionActivity $activity Choose at most one campaign/automation/node/transactional source. With no source, audience is required. An audience can also narrow a source. Includes every matching contact across pages. Marketers can use only marketing email sources.
     */
    #[JsonProperty('activity')]
    public ?CreateForAudienceCampaignsRequestSelectionActivity $activity;

    /**
     * @var ?CreateForAudienceCampaignsRequestSelectionContacts $contacts
     */
    #[JsonProperty('contacts')]
    public ?CreateForAudienceCampaignsRequestSelectionContacts $contacts;

    /**
     * @var value-of<CreateForAudienceCampaignsRequestSelectionSource> $source Provide only the matching contacts or activity object.
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @param array{
     *   source: value-of<CreateForAudienceCampaignsRequestSelectionSource>,
     *   activity?: ?CreateForAudienceCampaignsRequestSelectionActivity,
     *   contacts?: ?CreateForAudienceCampaignsRequestSelectionContacts,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->activity = $values['activity'] ?? null;
        $this->contacts = $values['contacts'] ?? null;
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
