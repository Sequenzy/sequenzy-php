<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Two-way Attio sync settings for a connected integration: saved maps in both directions, removal mirroring, inbound sync health, live people-lists from Attio, and this company's Sequenzy lists.
 */
class IntegrationAttioMapping extends JsonSerializableType
{
    /**
     * @var ?array<IntegrationAttioMappingAttioListsItem> $attioLists Attio people-lists the stored token can write, read live.
     */
    #[JsonProperty('attioLists'), ArrayType([IntegrationAttioMappingAttioListsItem::class])]
    public ?array $attioLists;

    /**
     * @var ?bool $changed Present on PATCH. False when already in the requested state.
     */
    #[JsonProperty('changed')]
    public ?bool $changed;

    /**
     * @var ?array<string> $changedFields Present on PATCH. Which settings actually moved (listMap, tagMap, inboundListMap, inboundTagMap, syncRemovals, syncCompanyFromDomain), plus inboundWebhook when the save set up, repaired or removed the Attio webhook.
     */
    #[JsonProperty('changedFields'), ArrayType(['string'])]
    public ?array $changedFields;

    /**
     * @var ?IntegrationAttioMappingInbound $inbound Inbound sync health.
     */
    #[JsonProperty('inbound')]
    public ?IntegrationAttioMappingInbound $inbound;

    /**
     * @var ?array<string, string> $inboundListMap Attio to Sequenzy. Attio list UUID to Sequenzy list id.
     */
    #[JsonProperty('inboundListMap'), ArrayType(['string' => 'string'])]
    public ?array $inboundListMap;

    /**
     * @var ?int $inboundMappingCount Number of saved Attio to Sequenzy mappings whose Attio source and Sequenzy target both still exist.
     */
    #[JsonProperty('inboundMappingCount')]
    public ?int $inboundMappingCount;

    /**
     * @var ?array<string, string> $inboundTagMap Attio to Sequenzy. Attio list UUID to Sequenzy tag name.
     */
    #[JsonProperty('inboundTagMap'), ArrayType(['string' => 'string'])]
    public ?array $inboundTagMap;

    /**
     * @var ?string $integrationId
     */
    #[JsonProperty('integrationId')]
    public ?string $integrationId;

    /**
     * @var ?array<string, string> $listMap Sequenzy to Attio. Sequenzy list id to Attio list UUID or api slug.
     */
    #[JsonProperty('listMap'), ArrayType(['string' => 'string'])]
    public ?array $listMap;

    /**
     * @var ?int $mappedListCount Number of saved listMap entries whose Sequenzy source and Attio target lists both still exist. Stale saved entries remain in listMap but are not counted.
     */
    #[JsonProperty('mappedListCount')]
    public ?int $mappedListCount;

    /**
     * @var ?int $mappedTagCount Number of saved tagMap entries whose Attio target list still exists.
     */
    #[JsonProperty('mappedTagCount')]
    public ?int $mappedTagCount;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?array<IntegrationAttioMappingSequenzyListsItem> $sequenzyLists
     */
    #[JsonProperty('sequenzyLists'), ArrayType([IntegrationAttioMappingSequenzyListsItem::class])]
    public ?array $sequenzyLists;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $syncCompanyFromDomain When true, upsert a company from the person's non-free-mail email domain.
     */
    #[JsonProperty('syncCompanyFromDomain')]
    public ?bool $syncCompanyFromDomain;

    /**
     * @var ?bool $syncRemovals Whether removals are mirrored in every mapped direction. False means the sync only adds people.
     */
    #[JsonProperty('syncRemovals')]
    public ?bool $syncRemovals;

    /**
     * @var ?array<string, string> $tagMap Sequenzy to Attio. Sequenzy tag name to Attio list UUID or api slug.
     */
    #[JsonProperty('tagMap'), ArrayType(['string' => 'string'])]
    public ?array $tagMap;

    /**
     * @param array{
     *   attioLists?: ?array<IntegrationAttioMappingAttioListsItem>,
     *   changed?: ?bool,
     *   changedFields?: ?array<string>,
     *   inbound?: ?IntegrationAttioMappingInbound,
     *   inboundListMap?: ?array<string, string>,
     *   inboundMappingCount?: ?int,
     *   inboundTagMap?: ?array<string, string>,
     *   integrationId?: ?string,
     *   listMap?: ?array<string, string>,
     *   mappedListCount?: ?int,
     *   mappedTagCount?: ?int,
     *   message?: ?string,
     *   provider?: ?string,
     *   sequenzyLists?: ?array<IntegrationAttioMappingSequenzyListsItem>,
     *   success?: ?bool,
     *   syncCompanyFromDomain?: ?bool,
     *   syncRemovals?: ?bool,
     *   tagMap?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attioLists = $values['attioLists'] ?? null;
        $this->changed = $values['changed'] ?? null;
        $this->changedFields = $values['changedFields'] ?? null;
        $this->inbound = $values['inbound'] ?? null;
        $this->inboundListMap = $values['inboundListMap'] ?? null;
        $this->inboundMappingCount = $values['inboundMappingCount'] ?? null;
        $this->inboundTagMap = $values['inboundTagMap'] ?? null;
        $this->integrationId = $values['integrationId'] ?? null;
        $this->listMap = $values['listMap'] ?? null;
        $this->mappedListCount = $values['mappedListCount'] ?? null;
        $this->mappedTagCount = $values['mappedTagCount'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->sequenzyLists = $values['sequenzyLists'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->syncCompanyFromDomain = $values['syncCompanyFromDomain'] ?? null;
        $this->syncRemovals = $values['syncRemovals'] ?? null;
        $this->tagMap = $values['tagMap'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
