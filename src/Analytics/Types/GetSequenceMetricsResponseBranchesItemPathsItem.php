<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class GetSequenceMetricsResponseBranchesItemPathsItem extends JsonSerializableType
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
     * @var ?int $index
     */
    #[JsonProperty('index')]
    public ?int $index;

    /**
     * @var ?value-of<GetSequenceMetricsResponseBranchesItemPathsItemKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?DateTime $lastDecidedAt
     */
    #[JsonProperty('lastDecidedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastDecidedAt;

    /**
     * @var ?bool $neverMatched
     */
    #[JsonProperty('neverMatched')]
    public ?bool $neverMatched;

    /**
     * @var ?string $pathId
     */
    #[JsonProperty('pathId')]
    public ?string $pathId;

    /**
     * @var ?int $people
     */
    #[JsonProperty('people')]
    public ?int $people;

    /**
     * @var ?float $share
     */
    #[JsonProperty('share')]
    public ?float $share;

    /**
     * @var ?float $targetShare
     */
    #[JsonProperty('targetShare')]
    public ?float $targetShare;

    /**
     * @var ?string $treePathId
     */
    #[JsonProperty('treePathId')]
    public ?string $treePathId;

    /**
     * @param array{
     *   decisions?: ?int,
     *   decisionsSinceUpdatedAt?: ?int,
     *   index?: ?int,
     *   kind?: ?value-of<GetSequenceMetricsResponseBranchesItemPathsItemKind>,
     *   label?: ?string,
     *   lastDecidedAt?: ?DateTime,
     *   neverMatched?: ?bool,
     *   pathId?: ?string,
     *   people?: ?int,
     *   share?: ?float,
     *   targetShare?: ?float,
     *   treePathId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->decisions = $values['decisions'] ?? null;
        $this->decisionsSinceUpdatedAt = $values['decisionsSinceUpdatedAt'] ?? null;
        $this->index = $values['index'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->lastDecidedAt = $values['lastDecidedAt'] ?? null;
        $this->neverMatched = $values['neverMatched'] ?? null;
        $this->pathId = $values['pathId'] ?? null;
        $this->people = $values['people'] ?? null;
        $this->share = $values['share'] ?? null;
        $this->targetShare = $values['targetShare'] ?? null;
        $this->treePathId = $values['treePathId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
