<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * PostHog and Segment: event delivery scope. Attio: listMap (Sequenzy list id to Attio list id or slug) and syncCompanyFromDomain.
 */
class ConnectIntegrationsRequestSettings extends JsonSerializableType
{
    /**
     * @var ?array<string> $eventAllowlist
     */
    #[JsonProperty('eventAllowlist'), ArrayType(['string'])]
    public ?array $eventAllowlist;

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
     *   listMap?: ?array<string, string>,
     *   syncAllEvents?: ?bool,
     *   syncCompanyFromDomain?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventAllowlist = $values['eventAllowlist'] ?? null;
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
