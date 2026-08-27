<?php

namespace Sequenzy\Segments\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Segments\Types\UpdateSegmentsRequestFilterJoinOperator;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\FilterLeaf;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\FilterGroup;

class UpdateSegmentsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateSegmentsRequestFilterJoinOperator> $filterJoinOperator
     */
    #[JsonProperty('filterJoinOperator')]
    public ?string $filterJoinOperator;

    /**
     * @var ?array<FilterLeaf> $filters
     */
    #[JsonProperty('filters'), ArrayType([FilterLeaf::class])]
    public ?array $filters;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?FilterGroup $root
     */
    #[JsonProperty('root')]
    public ?FilterGroup $root;

    /**
     * @param array{
     *   filterJoinOperator?: ?value-of<UpdateSegmentsRequestFilterJoinOperator>,
     *   filters?: ?array<FilterLeaf>,
     *   name?: ?string,
     *   root?: ?FilterGroup,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filterJoinOperator = $values['filterJoinOperator'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->root = $values['root'] ?? null;
    }
}
