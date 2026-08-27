<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class AbTest extends JsonSerializableType
{
    /**
     * @var ?string $automationNodeId
     */
    #[JsonProperty('automationNodeId')]
    public ?string $automationNodeId;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<AbTestKind> $kind Identifies which settings model applies to this test.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string, mixed> $settings Effective settings for this test kind. Campaign tests return testPercentage, testDurationMinutes, and winnerCriteria; sequence tests return testType, winnerThreshold, and winnerCriteria.
     */
    #[JsonProperty('settings'), ArrayType(['string' => 'mixed'])]
    public ?array $settings;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $testDurationMinutes Campaign test duration. Sequence tests retain the legacy internal sentinel value 0; use settings instead.
     */
    #[JsonProperty('testDurationMinutes')]
    public ?int $testDurationMinutes;

    /**
     * @var ?DateTime $testEndsAt
     */
    #[JsonProperty('testEndsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $testEndsAt;

    /**
     * @var ?int $testPercentage Campaign test audience percentage. Sequence tests retain the legacy internal sentinel value 100; use settings instead.
     */
    #[JsonProperty('testPercentage')]
    public ?int $testPercentage;

    /**
     * @var ?DateTime $testStartedAt
     */
    #[JsonProperty('testStartedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $testStartedAt;

    /**
     * @var ?value-of<AbTestTestType> $testType Effective sequence variant strategy. Present for sequence tests.
     */
    #[JsonProperty('testType')]
    public ?string $testType;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?array<AbTestVariant> $variants
     */
    #[JsonProperty('variants'), ArrayType([AbTestVariant::class])]
    public ?array $variants;

    /**
     * @var ?string $winnerCriteria
     */
    #[JsonProperty('winnerCriteria')]
    public ?string $winnerCriteria;

    /**
     * @var ?DateTime $winnerSelectedAt
     */
    #[JsonProperty('winnerSelectedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $winnerSelectedAt;

    /**
     * @var ?int $winnerThreshold Effective sequence recipient threshold. Present for sequence tests.
     */
    #[JsonProperty('winnerThreshold')]
    public ?int $winnerThreshold;

    /**
     * @var ?string $winningVariantId
     */
    #[JsonProperty('winningVariantId')]
    public ?string $winningVariantId;

    /**
     * @param array{
     *   automationNodeId?: ?string,
     *   campaignId?: ?string,
     *   companyId?: ?string,
     *   createdAt?: ?DateTime,
     *   id?: ?string,
     *   kind?: ?value-of<AbTestKind>,
     *   name?: ?string,
     *   settings?: ?array<string, mixed>,
     *   status?: ?string,
     *   testDurationMinutes?: ?int,
     *   testEndsAt?: ?DateTime,
     *   testPercentage?: ?int,
     *   testStartedAt?: ?DateTime,
     *   testType?: ?value-of<AbTestTestType>,
     *   updatedAt?: ?DateTime,
     *   variants?: ?array<AbTestVariant>,
     *   winnerCriteria?: ?string,
     *   winnerSelectedAt?: ?DateTime,
     *   winnerThreshold?: ?int,
     *   winningVariantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automationNodeId = $values['automationNodeId'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->testDurationMinutes = $values['testDurationMinutes'] ?? null;
        $this->testEndsAt = $values['testEndsAt'] ?? null;
        $this->testPercentage = $values['testPercentage'] ?? null;
        $this->testStartedAt = $values['testStartedAt'] ?? null;
        $this->testType = $values['testType'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->variants = $values['variants'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'] ?? null;
        $this->winnerSelectedAt = $values['winnerSelectedAt'] ?? null;
        $this->winnerThreshold = $values['winnerThreshold'] ?? null;
        $this->winningVariantId = $values['winningVariantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
