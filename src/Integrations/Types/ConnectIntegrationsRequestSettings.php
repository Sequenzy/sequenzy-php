<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * PostHog and Segment: event delivery scope. Attio: listMap (Sequenzy list id to Attio list id or slug) and syncCompanyFromDomain. SparkLoop: listIds for new referrals.
 */
class ConnectIntegrationsRequestSettings extends JsonSerializableType
{
    /**
     * @var ?array<string> $eventAllowlist
     */
    #[JsonProperty('eventAllowlist'), ArrayType(['string'])]
    public ?array $eventAllowlist;

    /**
     * @var ?array<string> $listIds SparkLoop only. Lists new referrals join. Omit to keep the current choice (the workspace default lists on a first connect), null to reset to the workspace default lists, or an empty array for none.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?array<string, string> $listMap Attio only. Sequenzy list id to Attio list UUID or slug.
     */
    #[JsonProperty('listMap'), ArrayType(['string' => 'string'])]
    public ?array $listMap;

    /**
     * @var ?bool $syncAllEvents
     */
    #[JsonProperty('syncAllEvents')]
    public ?bool $syncAllEvents;

    /**
     * @var ?bool $syncCompanyFromDomain Attio only. Upsert a company from the person's non-free-mail email domain.
     */
    #[JsonProperty('syncCompanyFromDomain')]
    public ?bool $syncCompanyFromDomain;

    /**
     * @param array{
     *   eventAllowlist?: ?array<string>,
     *   listIds?: ?array<string>,
     *   listMap?: ?array<string, string>,
     *   syncAllEvents?: ?bool,
     *   syncCompanyFromDomain?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventAllowlist = $values['eventAllowlist'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->listMap = $values['listMap'] ?? null;
        $this->syncAllEvents = $values['syncAllEvents'] ?? null;
        $this->syncCompanyFromDomain = $values['syncCompanyFromDomain'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
