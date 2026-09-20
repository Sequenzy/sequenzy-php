<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Who to enroll. Same shape as campaign targetLists.
 */
class SequenceAudience extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $exclude For type rules; exclude rules.
     */
    #[JsonProperty('exclude'), ArrayType([['string' => 'mixed']])]
    public ?array $exclude;

    /**
     * @var ?array<string> $excludedSubscriberIds
     */
    #[JsonProperty('excludedSubscriberIds'), ArrayType(['string'])]
    public ?array $excludedSubscriberIds;

    /**
     * @var ?value-of<SequenceAudienceFilterJoinOperator> $filterJoinOperator
     */
    #[JsonProperty('filterJoinOperator')]
    public ?string $filterJoinOperator;

    /**
     * @var ?array<array<string, mixed>> $filters For type filtered; subscriber filters.
     */
    #[JsonProperty('filters'), ArrayType([['string' => 'mixed']])]
    public ?array $filters;

    /**
     * @var ?array<array<string, mixed>> $include For type rules; include rules of type all, lists, segments, or filtered.
     */
    #[JsonProperty('include'), ArrayType([['string' => 'mixed']])]
    public ?array $include;

    /**
     * @var ?array<string> $listIds For type lists.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?string $segmentId For type segment.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @var value-of<SequenceAudienceType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<SequenceAudienceType>,
     *   exclude?: ?array<array<string, mixed>>,
     *   excludedSubscriberIds?: ?array<string>,
     *   filterJoinOperator?: ?value-of<SequenceAudienceFilterJoinOperator>,
     *   filters?: ?array<array<string, mixed>>,
     *   include?: ?array<array<string, mixed>>,
     *   listIds?: ?array<string>,
     *   segmentId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->exclude = $values['exclude'] ?? null;
        $this->excludedSubscriberIds = $values['excludedSubscriberIds'] ?? null;
        $this->filterJoinOperator = $values['filterJoinOperator'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->include = $values['include'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
