<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetConditionalBlockOverviewAliasSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?int $alertCount
     */
    #[JsonProperty('alertCount')]
    public ?int $alertCount;

    /**
     * @var ?string $automationId
     */
    #[JsonProperty('automationId')]
    public ?string $automationId;

    /**
     * @var ?string $automationName
     */
    #[JsonProperty('automationName')]
    public ?string $automationName;

    /**
     * @var ?array<array<string, mixed>> $steps
     */
    #[JsonProperty('steps'), ArrayType([['string' => 'mixed']])]
    public ?array $steps;

    /**
     * @var ?int $stepsWithConditions
     */
    #[JsonProperty('stepsWithConditions')]
    public ?int $stepsWithConditions;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $timedOut
     */
    #[JsonProperty('timedOut')]
    public ?bool $timedOut;

    /**
     * @var ?int $totalRuleGroups
     */
    #[JsonProperty('totalRuleGroups')]
    public ?int $totalRuleGroups;

    /**
     * @param array{
     *   alertCount?: ?int,
     *   automationId?: ?string,
     *   automationName?: ?string,
     *   steps?: ?array<array<string, mixed>>,
     *   stepsWithConditions?: ?int,
     *   success?: ?bool,
     *   timedOut?: ?bool,
     *   totalRuleGroups?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->alertCount = $values['alertCount'] ?? null;
        $this->automationId = $values['automationId'] ?? null;
        $this->automationName = $values['automationName'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->stepsWithConditions = $values['stepsWithConditions'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->timedOut = $values['timedOut'] ?? null;
        $this->totalRuleGroups = $values['totalRuleGroups'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
