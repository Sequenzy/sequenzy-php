<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\FilterLeaf;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\FilterGroup;

/**
 * Defaults to all contacts. Selection walks live pages before mutations, excludes contacts created after the request, and is not a point-in-time database snapshot. Provide root or filters, never both.
 */
class SubscriberOperationStartAudience extends JsonSerializableType
{
    /**
     * @var ?bool $activeOnly
     */
    #[JsonProperty('activeOnly')]
    public ?bool $activeOnly;

    /**
     * @var ?value-of<SubscriberOperationStartAudienceFilterJoinOperator> $filterJoinOperator
     */
    #[JsonProperty('filterJoinOperator')]
    public ?string $filterJoinOperator;

    /**
     * @var ?array<FilterLeaf> $filters
     */
    #[JsonProperty('filters'), ArrayType([FilterLeaf::class])]
    public ?array $filters;

    /**
     * @var ?string $listId
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?FilterGroup $root
     */
    #[JsonProperty('root')]
    public ?FilterGroup $root;

    /**
     * @var ?string $search
     */
    #[JsonProperty('search')]
    public ?string $search;

    /**
     * @var ?array<string> $subscriberIds
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   activeOnly?: ?bool,
     *   filterJoinOperator?: ?value-of<SubscriberOperationStartAudienceFilterJoinOperator>,
     *   filters?: ?array<FilterLeaf>,
     *   listId?: ?string,
     *   root?: ?FilterGroup,
     *   search?: ?string,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeOnly = $values['activeOnly'] ?? null;
        $this->filterJoinOperator = $values['filterJoinOperator'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->root = $values['root'] ?? null;
        $this->search = $values['search'] ?? null;
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
