<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Attio list mapping for a connected integration: saved Sequenzy-to-Attio listMap, live people-lists from Attio, and this company's Sequenzy lists.
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
     * @var ?array<string> $changedFields Present on PATCH. Which settings actually moved.
     */
    #[JsonProperty('changedFields'), ArrayType(['string'])]
    public ?array $changedFields;

    /**
     * @var ?string $integrationId
     */
    #[JsonProperty('integrationId')]
    public ?string $integrationId;

    /**
     * @var ?array<string, string> $listMap Sequenzy list id to Attio list UUID or api slug.
     */
    #[JsonProperty('listMap'), ArrayType(['string' => 'string'])]
    public ?array $listMap;

    /**
     * @var ?int $mappedListCount Number of saved mappings whose Sequenzy source and Attio target lists both still exist. Stale saved entries remain in listMap but are not counted.
     */
    #[JsonProperty('mappedListCount')]
    public ?int $mappedListCount;

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
     * @param array{
     *   attioLists?: ?array<IntegrationAttioMappingAttioListsItem>,
     *   changed?: ?bool,
     *   changedFields?: ?array<string>,
     *   integrationId?: ?string,
     *   listMap?: ?array<string, string>,
     *   mappedListCount?: ?int,
     *   message?: ?string,
     *   provider?: ?string,
     *   sequenzyLists?: ?array<IntegrationAttioMappingSequenzyListsItem>,
     *   success?: ?bool,
     *   syncCompanyFromDomain?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attioLists = $values['attioLists'] ?? null;
        $this->changed = $values['changed'] ?? null;
        $this->changedFields = $values['changedFields'] ?? null;
        $this->integrationId = $values['integrationId'] ?? null;
        $this->listMap = $values['listMap'] ?? null;
        $this->mappedListCount = $values['mappedListCount'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->sequenzyLists = $values['sequenzyLists'] ?? null;
        $this->success = $values['success'] ?? null;
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
