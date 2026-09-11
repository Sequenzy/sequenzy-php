<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateForAudienceCampaignsRequestSelectionContacts extends JsonSerializableType
{
    /**
     * @var ?bool $activeOnly
     */
    #[JsonProperty('activeOnly')]
    public ?bool $activeOnly;

    /**
     * @var ?array<string> $excludedSubscriberIds
     */
    #[JsonProperty('excludedSubscriberIds'), ArrayType(['string'])]
    public ?array $excludedSubscriberIds;

    /**
     * @var ?value-of<CreateForAudienceCampaignsRequestSelectionContactsFilterJoinOperator> $filterJoinOperator
     */
    #[JsonProperty('filterJoinOperator')]
    public ?string $filterJoinOperator;

    /**
     * @var ?array<CreateForAudienceCampaignsRequestSelectionContactsFiltersItem> $filters Subscriber filters. Mutually exclusive with root and segmentId.
     */
    #[JsonProperty('filters'), ArrayType([CreateForAudienceCampaignsRequestSelectionContactsFiltersItem::class])]
    public ?array $filters;

    /**
     * @var ?string $listId
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?CreateForAudienceCampaignsRequestSelectionContactsRoot $root Nested subscriber filter tree, maximum depth 8. Mutually exclusive with filters and segmentId.
     */
    #[JsonProperty('root')]
    public ?CreateForAudienceCampaignsRequestSelectionContactsRoot $root;

    /**
     * @var ?string $search
     */
    #[JsonProperty('search')]
    public ?string $search;

    /**
     * @var ?string $segmentId Saved segment. Do not also provide filters or root.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var ?array<string> $subscriberIds Explicit selected IDs, all owned by this company. Omit to select all matching contacts.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   activeOnly?: ?bool,
     *   excludedSubscriberIds?: ?array<string>,
     *   filterJoinOperator?: ?value-of<CreateForAudienceCampaignsRequestSelectionContactsFilterJoinOperator>,
     *   filters?: ?array<CreateForAudienceCampaignsRequestSelectionContactsFiltersItem>,
     *   listId?: ?string,
     *   root?: ?CreateForAudienceCampaignsRequestSelectionContactsRoot,
     *   search?: ?string,
     *   segmentId?: ?string,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeOnly = $values['activeOnly'] ?? null;
        $this->excludedSubscriberIds = $values['excludedSubscriberIds'] ?? null;
        $this->filterJoinOperator = $values['filterJoinOperator'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->root = $values['root'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
