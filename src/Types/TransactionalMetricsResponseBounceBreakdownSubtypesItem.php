<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalMetricsResponseBounceBreakdownSubtypesItem extends JsonSerializableType
{
    /**
     * @var ?int $count
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?string $subType
     */
    #[JsonProperty('subType')]
    public ?string $subType;

    /**
     * @var ?value-of<TransactionalMetricsResponseBounceBreakdownSubtypesItemType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   count?: ?int,
     *   subType?: ?string,
     *   type?: ?value-of<TransactionalMetricsResponseBounceBreakdownSubtypesItemType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->subType = $values['subType'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
