<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetOutcomesAliasSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $availableGoals
     */
    #[JsonProperty('availableGoals'), ArrayType([['string' => 'mixed']])]
    public ?array $availableGoals;

    /**
     * @var ?array<string, mixed> $baseline
     */
    #[JsonProperty('baseline'), ArrayType(['string' => 'mixed'])]
    public ?array $baseline;

    /**
     * @var ?array<array<string, mixed>> $branches
     */
    #[JsonProperty('branches'), ArrayType([['string' => 'mixed']])]
    public ?array $branches;

    /**
     * @var ?int $conversionWindowDays
     */
    #[JsonProperty('conversionWindowDays')]
    public ?int $conversionWindowDays;

    /**
     * @var ?array<string, mixed> $outcome
     */
    #[JsonProperty('outcome'), ArrayType(['string' => 'mixed'])]
    public ?array $outcome;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?array<array<string, mixed>> $steps
     */
    #[JsonProperty('steps'), ArrayType([['string' => 'mixed']])]
    public ?array $steps;

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
     * @param array{
     *   availableGoals?: ?array<array<string, mixed>>,
     *   baseline?: ?array<string, mixed>,
     *   branches?: ?array<array<string, mixed>>,
     *   conversionWindowDays?: ?int,
     *   outcome?: ?array<string, mixed>,
     *   sequenceId?: ?string,
     *   steps?: ?array<array<string, mixed>>,
     *   success?: ?bool,
     *   timedOut?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->availableGoals = $values['availableGoals'] ?? null;
        $this->baseline = $values['baseline'] ?? null;
        $this->branches = $values['branches'] ?? null;
        $this->conversionWindowDays = $values['conversionWindowDays'] ?? null;
        $this->outcome = $values['outcome'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->timedOut = $values['timedOut'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
