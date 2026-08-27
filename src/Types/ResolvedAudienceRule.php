<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ResolvedAudienceRule extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $filters
     */
    #[JsonProperty('filters'), ArrayType([['string' => 'mixed']])]
    public ?array $filters;

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
     * @var ?value-of<ResolvedAudienceRuleType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   filters?: ?array<array<string, mixed>>,
     *   lists?: ?array<ResolvedAudienceEntity>,
     *   segments?: ?array<ResolvedAudienceEntity>,
     *   type?: ?value-of<ResolvedAudienceRuleType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filters = $values['filters'] ?? null;
        $this->lists = $values['lists'] ?? null;
        $this->segments = $values['segments'] ?? null;
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
