<?php

namespace Sequenzy\AbTests\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\AbTests\Types\CreateAbTestsRequestTestType;
use Sequenzy\AbTests\Types\CreateAbTestsRequestVariantsItem;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\AbTests\Types\CreateAbTestsRequestWinnerCriteria;

class CreateAbTestsRequest extends JsonSerializableType
{
    /**
     * @var ?string $automationNodeId Sequence action_email node to convert. Mutually exclusive with campaignId.
     */
    #[JsonProperty('automationNodeId')]
    public ?string $automationNodeId;

    /**
     * @var ?string $campaignId Campaign to attach the test to. Must be in draft or rejected status. Mutually exclusive with automationNodeId.
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?bool $confirmLiveChange Must be true when converting an email node in an active sequence.
     */
    #[JsonProperty('confirmLiveChange')]
    public ?bool $confirmLiveChange;

    /**
     * @var ?string $name Test name. Defaults to "A/B Test for <campaign name>".
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $testDurationMinutes Campaign-only duration before winner selection. Sequence tests select after winnerThreshold recipients.
     */
    #[JsonProperty('testDurationMinutes')]
    public ?int $testDurationMinutes;

    /**
     * @var ?int $testPercentage Campaign-only share of the audience that receives test sends. Sequence tests use winnerThreshold.
     */
    #[JsonProperty('testPercentage')]
    public ?int $testPercentage;

    /**
     * @var ?value-of<CreateAbTestsRequestTestType> $testType Sequence variant strategy. Subject defaults to open_rate and content defaults to click_rate unless winnerCriteria is explicit.
     */
    #[JsonProperty('testType')]
    public ?string $testType;

    /**
     * @var ?array<CreateAbTestsRequestVariantsItem> $variants Extra variants beyond the control. Required (min 1) when converting with automationNodeId. Total variants cannot exceed 5.
     */
    #[JsonProperty('variants'), ArrayType([CreateAbTestsRequestVariantsItem::class])]
    public ?array $variants;

    /**
     * @var ?value-of<CreateAbTestsRequestWinnerCriteria> $winnerCriteria Metric used to pick the winner. For sequence tests, an explicit value overrides the testType default.
     */
    #[JsonProperty('winnerCriteria')]
    public ?string $winnerCriteria;

    /**
     * @var ?int $winnerThreshold Number of sequence recipients in the test sample.
     */
    #[JsonProperty('winnerThreshold')]
    public ?int $winnerThreshold;

    /**
     * @param array{
     *   automationNodeId?: ?string,
     *   campaignId?: ?string,
     *   confirmLiveChange?: ?bool,
     *   name?: ?string,
     *   testDurationMinutes?: ?int,
     *   testPercentage?: ?int,
     *   testType?: ?value-of<CreateAbTestsRequestTestType>,
     *   variants?: ?array<CreateAbTestsRequestVariantsItem>,
     *   winnerCriteria?: ?value-of<CreateAbTestsRequestWinnerCriteria>,
     *   winnerThreshold?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automationNodeId = $values['automationNodeId'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->testDurationMinutes = $values['testDurationMinutes'] ?? null;
        $this->testPercentage = $values['testPercentage'] ?? null;
        $this->testType = $values['testType'] ?? null;
        $this->variants = $values['variants'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'] ?? null;
        $this->winnerThreshold = $values['winnerThreshold'] ?? null;
    }
}
