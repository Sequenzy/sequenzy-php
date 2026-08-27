<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ResolvedCampaignAudience extends JsonSerializableType
{
    /**
     * @var ?array<ResolvedAudienceRule> $exclude
     */
    #[JsonProperty('exclude'), ArrayType([ResolvedAudienceRule::class])]
    public ?array $exclude;

    /**
     * @var ?array<string> $excludedCampaignOpenerIds
     */
    #[JsonProperty('excludedCampaignOpenerIds'), ArrayType(['string'])]
    public ?array $excludedCampaignOpenerIds;

    /**
     * @var ?array<string> $excludedSubscriberIds
     */
    #[JsonProperty('excludedSubscriberIds'), ArrayType(['string'])]
    public ?array $excludedSubscriberIds;

    /**
     * @var ?value-of<ResolvedCampaignAudienceFilterJoinOperator> $filterJoinOperator
     */
    #[JsonProperty('filterJoinOperator')]
    public ?string $filterJoinOperator;

    /**
     * @var ?array<array<string, mixed>> $filters
     */
    #[JsonProperty('filters'), ArrayType([['string' => 'mixed']])]
    public ?array $filters;

    /**
     * @var ?array<ResolvedAudienceRule> $include
     */
    #[JsonProperty('include'), ArrayType([ResolvedAudienceRule::class])]
    public ?array $include;

    /**
     * @var ?array<string> $includedSubscriberIds
     */
    #[JsonProperty('includedSubscriberIds'), ArrayType(['string'])]
    public ?array $includedSubscriberIds;

    /**
     * @var ?bool $isUnset True when targeting has never been set, so scheduling sends to every active subscriber.
     */
    #[JsonProperty('isUnset')]
    public ?bool $isUnset;

    /**
     * @var ?array<ResolvedAudienceEntity> $lists
     */
    #[JsonProperty('lists'), ArrayType([ResolvedAudienceEntity::class])]
    public ?array $lists;

    /**
     * @var ?array<ResolvedAudienceEntity> $segments
     */
    #[JsonProperty('segments'), ArrayType([ResolvedAudienceEntity::class])]
    public ?array $segments;

    /**
     * @var ?string $summary Plain-language description of who the campaign reaches.
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?value-of<ResolvedCampaignAudienceType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   exclude?: ?array<ResolvedAudienceRule>,
     *   excludedCampaignOpenerIds?: ?array<string>,
     *   excludedSubscriberIds?: ?array<string>,
     *   filterJoinOperator?: ?value-of<ResolvedCampaignAudienceFilterJoinOperator>,
     *   filters?: ?array<array<string, mixed>>,
     *   include?: ?array<ResolvedAudienceRule>,
     *   includedSubscriberIds?: ?array<string>,
     *   isUnset?: ?bool,
     *   lists?: ?array<ResolvedAudienceEntity>,
     *   segments?: ?array<ResolvedAudienceEntity>,
     *   summary?: ?string,
     *   type?: ?value-of<ResolvedCampaignAudienceType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->exclude = $values['exclude'] ?? null;
        $this->excludedCampaignOpenerIds = $values['excludedCampaignOpenerIds'] ?? null;
        $this->excludedSubscriberIds = $values['excludedSubscriberIds'] ?? null;
        $this->filterJoinOperator = $values['filterJoinOperator'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->include = $values['include'] ?? null;
        $this->includedSubscriberIds = $values['includedSubscriberIds'] ?? null;
        $this->isUnset = $values['isUnset'] ?? null;
        $this->lists = $values['lists'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->summary = $values['summary'] ?? null;
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
