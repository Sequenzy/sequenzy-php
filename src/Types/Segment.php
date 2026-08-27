<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class Segment extends JsonSerializableType
{
    /**
     * @var ?int $activeSubscriberCount
     */
    #[JsonProperty('activeSubscriberCount')]
    public ?int $activeSubscriberCount;

    /**
     * @var ?value-of<SegmentFilterJoinOperator> $filterJoinOperator
     */
    #[JsonProperty('filterJoinOperator')]
    public ?string $filterJoinOperator;

    /**
     * @var ?array<FilterLeaf> $filters Legacy v1 flat filters, or flattened leaves for v2 responses.
     */
    #[JsonProperty('filters'), ArrayType([FilterLeaf::class])]
    public ?array $filters;

    /**
     * @var ?value-of<SegmentFormat> $format
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

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
     * @var ?int $subscriberCount
     */
    #[JsonProperty('subscriberCount')]
    public ?int $subscriberCount;

    /**
     * @param array{
     *   activeSubscriberCount?: ?int,
     *   filterJoinOperator?: ?value-of<SegmentFilterJoinOperator>,
     *   filters?: ?array<FilterLeaf>,
     *   format?: ?value-of<SegmentFormat>,
     *   id?: ?string,
     *   name?: ?string,
     *   root?: ?FilterGroup,
     *   subscriberCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeSubscriberCount = $values['activeSubscriberCount'] ?? null;
        $this->filterJoinOperator = $values['filterJoinOperator'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->root = $values['root'] ?? null;
        $this->subscriberCount = $values['subscriberCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
