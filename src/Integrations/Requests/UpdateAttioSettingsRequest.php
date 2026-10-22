<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateAttioSettingsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, string> $inboundListMap Attio to Sequenzy. Complete Attio list UUID or api slug to Sequenzy list id map. Saved with Attio list UUIDs. Needs webhook:read-write on the Attio token.
     */
    #[JsonProperty('inboundListMap'), ArrayType(['string' => 'string'])]
    public ?array $inboundListMap;

    /**
     * @var ?array<string, string> $inboundTagMap Attio to Sequenzy. Complete Attio list UUID or api slug to Sequenzy tag name map. Needs webhook:read-write on the Attio token.
     */
    #[JsonProperty('inboundTagMap'), ArrayType(['string' => 'string'])]
    public ?array $inboundTagMap;

    /**
     * @var ?array<string, string> $listMap Sequenzy to Attio. Complete Sequenzy list id to Attio list UUID or api slug map. Replaces the saved map. Pass {} to clear every mapping.
     */
    #[JsonProperty('listMap'), ArrayType(['string' => 'string'])]
    public ?array $listMap;

    /**
     * @var ?bool $syncCompanyFromDomain When true, upsert a company from the person's non-free-mail email domain.
     */
    #[JsonProperty('syncCompanyFromDomain')]
    public ?bool $syncCompanyFromDomain;

    /**
     * @var ?bool $syncRemovals Mirror removals in every mapped direction. Defaults to false (add-only).
     */
    #[JsonProperty('syncRemovals')]
    public ?bool $syncRemovals;

    /**
     * @var ?array<string, string> $tagMap Sequenzy to Attio. Complete Sequenzy tag name to Attio list UUID or api slug map. Tag names are normalized (lowercase, spaces become dashes), at most 255 characters.
     */
    #[JsonProperty('tagMap'), ArrayType(['string' => 'string'])]
    public ?array $tagMap;

    /**
     * @param array{
     *   inboundListMap?: ?array<string, string>,
     *   inboundTagMap?: ?array<string, string>,
     *   listMap?: ?array<string, string>,
     *   syncCompanyFromDomain?: ?bool,
     *   syncRemovals?: ?bool,
     *   tagMap?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inboundListMap = $values['inboundListMap'] ?? null;
        $this->inboundTagMap = $values['inboundTagMap'] ?? null;
        $this->listMap = $values['listMap'] ?? null;
        $this->syncCompanyFromDomain = $values['syncCompanyFromDomain'] ?? null;
        $this->syncRemovals = $values['syncRemovals'] ?? null;
        $this->tagMap = $values['tagMap'] ?? null;
    }
}
