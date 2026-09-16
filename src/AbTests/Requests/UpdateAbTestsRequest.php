<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\AbTests\Types\UpdateAbTestsRequestTestType;
use Sequenzy\AbTests\Types\UpdateAbTestsRequestWinnerCriteria;

class UpdateAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $cancelSampleUpdate Discard a failed campaign sample request. Cannot be combined with testPercentage; does not undo committed sends.
     */
    #[JsonProperty('cancelSampleUpdate')]
    public ?bool $cancelSampleUpdate;

    /**
     * @var ?bool $confirmLiveChange Required when sequence settings affect an active test or a test with recorded activity.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

    /**
     * @var ?DateTime $expectedUpdatedAt Optional campaign revision from GET; stale values return 409. Omit to preserve existing unconditional update behavior.
     */
    #[JsonProperty('expectedUpdatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expectedUpdatedAt;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $testDurationMinutes Campaign-only total minutes from the original test start. An elapsed deadline queues selection immediately; paused campaigns stay paused.
     */
    #[JsonProperty('testDurationMinutes')]
    public ?int $testDurationMinutes;

    /**
     * @var ?int $testPercentage Campaign-only integer share of the original full audience. Live changes queue a durable request; repeat the same percentage to retry.
     */
    #[JsonProperty('testPercentage')]
    public ?int $testPercentage;

    /**
     * @var ?value-of<UpdateAbTestsRequestTestType> $testType Sequence-only variant strategy.
     */
    #[JsonProperty('testType')]
    public ?string $testType;

    /**
     * @var ?value-of<UpdateAbTestsRequestWinnerCriteria> $winnerCriteria Winner metric for campaign or sequence tests; immutable once campaign testing starts.
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
     *   cancelSampleUpdate?: ?bool,
     *   confirmLiveChange?: ?bool,
     *   expectedUpdatedAt?: ?DateTime,
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
        $this->cancelSampleUpdate = $values['cancelSampleUpdate'] ?? null;
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->expectedUpdatedAt = $values['expectedUpdatedAt'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->testDurationMinutes = $values['testDurationMinutes'] ?? null;
        $this->testPercentage = $values['testPercentage'] ?? null;
        $this->testType = $values['testType'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'] ?? null;
        $this->winnerThreshold = $values['winnerThreshold'] ?? null;
    }
}
