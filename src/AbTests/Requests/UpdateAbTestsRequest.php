<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\AbTests\Types\UpdateAbTestsRequestTestType;
use Sequenzy\AbTests\Types\UpdateAbTestsRequestWinnerCriteria;

class UpdateAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $confirmLiveChange Required when sequence settings affect an active test or a test with recorded activity.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $testDurationMinutes Campaign-only test duration.
     */
    #[JsonProperty('testDurationMinutes')]
    public ?int $testDurationMinutes;

    /**
     * @var ?int $testPercentage Campaign-only test audience percentage.
     */
    #[JsonProperty('testPercentage')]
    public ?int $testPercentage;

    /**
     * @var ?value-of<UpdateAbTestsRequestTestType> $testType Sequence-only variant strategy.
     */
    #[JsonProperty('testType')]
    public ?string $testType;

    /**
     * @var ?value-of<UpdateAbTestsRequestWinnerCriteria> $winnerCriteria Winner metric for campaign or sequence tests.
     */
    #[JsonProperty('winnerCriteria')]
    public ?string $winnerCriteria;

    /**
     * @var ?int $winnerThreshold Sequence-only recipient threshold.
     */
    #[JsonProperty('winnerThreshold')]
    public ?int $winnerThreshold;

    /**
     * @param array{
     *   confirmLiveChange?: ?bool,
     *   name?: ?string,
     *   testDurationMinutes?: ?int,
     *   testPercentage?: ?int,
     *   testType?: ?value-of<UpdateAbTestsRequestTestType>,
     *   winnerCriteria?: ?value-of<UpdateAbTestsRequestWinnerCriteria>,
     *   winnerThreshold?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->testDurationMinutes = $values['testDurationMinutes'] ?? null;
        $this->testPercentage = $values['testPercentage'] ?? null;
        $this->testType = $values['testType'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'] ?? null;
        $this->winnerThreshold = $values['winnerThreshold'] ?? null;
    }
}
