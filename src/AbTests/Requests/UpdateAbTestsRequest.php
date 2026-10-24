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
     * @var ?bool $autoSelectWinner Sequence-only. True picks the leading variant once winnerThreshold is reached; false keeps splitting until a winner is selected. Resume sets it to false.
     */
    #[JsonProperty('autoSelectWinner')]
    public ?bool $autoSelectWinner;

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
     * @var ?bool $endTestNow Campaign-only. End a running test now: the winner is picked by winnerCriteria from the results so far and sent to the remaining audience. Requires campaigns:send. Cannot be combined with testDurationMinutes; returns 400 for tests that are not running and 409 while a sample change is pending.
     */
    #[JsonProperty('endTestNow')]
    public ?bool $endTestNow;

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
     * @var ?value-of<UpdateAbTestsRequestWinnerCriteria> $winnerCriteria Winner metric for campaign or sequence tests; immutable once campaign testing starts, together with winnerGoalId and winnerEventName. Changing the criterion clears a goal or event the new criterion does not use.
     */
    #[JsonProperty('winnerCriteria')]
    public ?string $winnerCriteria;

    /**
     * @var ?string $winnerEventName Required for `event_rate`. The event a recipient must fire after receiving the variant.
     */
    #[JsonProperty('winnerEventName')]
    public ?string $winnerEventName;

    /**
     * @var ?string $winnerGoalId Required for `goal_conversion_rate` and `goal_value`. A goal ID that is active and company-wide or scoped to this campaign or sequence, or `default-revenue` for built-in purchase revenue (SaaS purchases and commerce orders, in cents). Other goals return 400.
     */
    #[JsonProperty('winnerGoalId')]
    public ?string $winnerGoalId;

    /**
     * @var ?int $winnerThreshold Sequence-only recipient threshold.
     */
    #[JsonProperty('winnerThreshold')]
    public ?int $winnerThreshold;

    /**
     * @param array{
     *   autoSelectWinner?: ?bool,
     *   cancelSampleUpdate?: ?bool,
     *   confirmLiveChange?: ?bool,
     *   endTestNow?: ?bool,
     *   expectedUpdatedAt?: ?DateTime,
     *   name?: ?string,
     *   testDurationMinutes?: ?int,
     *   testPercentage?: ?int,
     *   testType?: ?value-of<UpdateAbTestsRequestTestType>,
     *   winnerCriteria?: ?value-of<UpdateAbTestsRequestWinnerCriteria>,
     *   winnerEventName?: ?string,
     *   winnerGoalId?: ?string,
     *   winnerThreshold?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->autoSelectWinner = $values['autoSelectWinner'] ?? null;
        $this->cancelSampleUpdate = $values['cancelSampleUpdate'] ?? null;
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->endTestNow = $values['endTestNow'] ?? null;
        $this->expectedUpdatedAt = $values['expectedUpdatedAt'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->testDurationMinutes = $values['testDurationMinutes'] ?? null;
        $this->testPercentage = $values['testPercentage'] ?? null;
        $this->testType = $values['testType'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'] ?? null;
        $this->winnerEventName = $values['winnerEventName'] ?? null;
        $this->winnerGoalId = $values['winnerGoalId'] ?? null;
        $this->winnerThreshold = $values['winnerThreshold'] ?? null;
    }
}
