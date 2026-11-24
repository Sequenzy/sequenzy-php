<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetSequenceMetricsResponseBranchesItem extends JsonSerializableType
{
    /**
     * @var ?int $decisions
     */
    #[JsonProperty('decisions')]
    public ?int $decisions;

    /**
     * @var ?int $decisionsSinceUpdatedAt
     */
    #[JsonProperty('decisionsSinceUpdatedAt')]
    public ?int $decisionsSinceUpdatedAt;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?bool $lopsidedElse
     */
    #[JsonProperty('lopsidedElse')]
    public ?bool $lopsidedElse;

    /**
     * @var ?string $nodeId
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?value-of<GetSequenceMetricsResponseBranchesItemNodeType> $nodeType
     */
    #[JsonProperty('nodeType')]
    public ?string $nodeType;

    /**
     * @var ?array<GetSequenceMetricsResponseBranchesItemPathsItem> $paths
     */
    #[JsonProperty('paths'), ArrayType([GetSequenceMetricsResponseBranchesItemPathsItem::class])]
    public ?array $paths;

    /**
     * @var ?value-of<GetSequenceMetricsResponseBranchesItemSplitMode> $splitMode
     */
    #[JsonProperty('splitMode')]
    public ?string $splitMode;

    /**
     * @var ?GetSequenceMetricsResponseBranchesItemUnmapped $unmapped
     */
    #[JsonProperty('unmapped')]
    public ?GetSequenceMetricsResponseBranchesItemUnmapped $unmapped;

    /**
     * @var ?GetSequenceMetricsResponseBranchesItemUnrecorded $unrecorded
     */
    #[JsonProperty('unrecorded')]
    public ?GetSequenceMetricsResponseBranchesItemUnrecorded $unrecorded;

    /**
     * @param array{
     *   decisions?: ?int,
     *   decisionsSinceUpdatedAt?: ?int,
     *   label?: ?string,
     *   lopsidedElse?: ?bool,
     *   nodeId?: ?string,
     *   nodeType?: ?value-of<GetSequenceMetricsResponseBranchesItemNodeType>,
     *   paths?: ?array<GetSequenceMetricsResponseBranchesItemPathsItem>,
     *   splitMode?: ?value-of<GetSequenceMetricsResponseBranchesItemSplitMode>,
     *   unmapped?: ?GetSequenceMetricsResponseBranchesItemUnmapped,
     *   unrecorded?: ?GetSequenceMetricsResponseBranchesItemUnrecorded,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->decisions = $values['decisions'] ?? null;
        $this->decisionsSinceUpdatedAt = $values['decisionsSinceUpdatedAt'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->lopsidedElse = $values['lopsidedElse'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->nodeType = $values['nodeType'] ?? null;
        $this->paths = $values['paths'] ?? null;
        $this->splitMode = $values['splitMode'] ?? null;
        $this->unmapped = $values['unmapped'] ?? null;
        $this->unrecorded = $values['unrecorded'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
