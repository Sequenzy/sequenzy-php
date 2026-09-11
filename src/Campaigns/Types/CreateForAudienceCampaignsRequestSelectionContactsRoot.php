<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Nested subscriber filter tree, maximum depth 8. Mutually exclusive with filters and segmentId.
 */
class CreateForAudienceCampaignsRequestSelectionContactsRoot extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $children
     */
    #[JsonProperty('children'), ArrayType([['string' => 'mixed']])]
    public array $children;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<CreateForAudienceCampaignsRequestSelectionContactsRootJoinOperator> $joinOperator
     */
    #[JsonProperty('joinOperator')]
    public string $joinOperator;

    /**
     * @var value-of<CreateForAudienceCampaignsRequestSelectionContactsRootKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @param array{
     *   children: array<array<string, mixed>>,
     *   id: string,
     *   joinOperator: value-of<CreateForAudienceCampaignsRequestSelectionContactsRootJoinOperator>,
     *   kind: value-of<CreateForAudienceCampaignsRequestSelectionContactsRootKind>,
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
