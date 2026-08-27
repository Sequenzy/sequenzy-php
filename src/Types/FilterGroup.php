<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * A nested AND/OR filter group.
 */
class FilterGroup extends JsonSerializableType
{
    /**
     * @var array<FilterGroupChildrenItem> $children
     */
    #[JsonProperty('children'), ArrayType([FilterGroupChildrenItem::class])]
    public array $children;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<FilterGroupJoinOperator> $joinOperator
     */
    #[JsonProperty('joinOperator')]
    public string $joinOperator;

    /**
     * @var value-of<FilterGroupKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @param array{
     *   children: array<FilterGroupChildrenItem>,
     *   id: string,
     *   joinOperator: value-of<FilterGroupJoinOperator>,
     *   kind: value-of<FilterGroupKind>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->children = $values['children'];
        $this->id = $values['id'];
        $this->joinOperator = $values['joinOperator'];
        $this->kind = $values['kind'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
