<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TransactionalMetricsResponseBounceBreakdown extends JsonSerializableType
{
    /**
     * @var ?int $permanent
     */
    #[JsonProperty('permanent')]
    public ?int $permanent;

    /**
     * @var ?array<TransactionalMetricsResponseBounceBreakdownSubtypesItem> $subtypes
     */
    #[JsonProperty('subtypes'), ArrayType([TransactionalMetricsResponseBounceBreakdownSubtypesItem::class])]
    public ?array $subtypes;

    /**
     * @var ?int $transient
     */
    #[JsonProperty('transient')]
    public ?int $transient;

    /**
     * @var ?int $undetermined
     */
    #[JsonProperty('undetermined')]
    public ?int $undetermined;

    /**
     * @param array{
     *   permanent?: ?int,
     *   subtypes?: ?array<TransactionalMetricsResponseBounceBreakdownSubtypesItem>,
     *   transient?: ?int,
     *   undetermined?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->permanent = $values['permanent'] ?? null;
        $this->subtypes = $values['subtypes'] ?? null;
        $this->transient = $values['transient'] ?? null;
        $this->undetermined = $values['undetermined'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
