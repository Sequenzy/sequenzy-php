<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * One finding of the account health check. The same problem keeps one insight across checks.
 */
class AccountHealthInsight extends JsonSerializableType
{
    /**
     * @var ?array<AccountHealthAction> $actions What to do about the finding, primary first. Actions with a path open that dashboard screen; the others are performed by the api call listed, after the confirm prompt when one is given.
     */
    #[JsonProperty('actions'), ArrayType([AccountHealthAction::class])]
    public ?array $actions;

    /**
     * @var ?string $detail
     */
    #[JsonProperty('detail')]
    public ?string $detail;

    /**
     * @var ?value-of<AccountHealthInsightDetector> $detector
     */
    #[JsonProperty('detector')]
    public ?string $detector;

    /**
     * @var ?array<string, mixed> $evidence Detector-specific numbers behind the finding. Event findings carry `monthlyRevenue` (USD a month the people behind the event pay) when a payment integration syncs revenue to contacts. A missing_sequence finding carries the suggested `playbook`, `name`, `goal`, `trigger` and `steps`.
     */
    #[JsonProperty('evidence'), ArrayType(['string' => 'mixed'])]
    public ?array $evidence;

    /**
     * @var ?DateTime $firstSeenAt
     */
    #[JsonProperty('firstSeenAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $firstSeenAt;

    /**
     * @var ?string $fixAutomationId Inactive draft sequence the agent created to fix this, if any.
     */
    #[JsonProperty('fixAutomationId')]
    public ?string $fixAutomationId;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $lastSeenAt
     */
    #[JsonProperty('lastSeenAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSeenAt;

    /**
     * @var ?string $recommendation
     */
    #[JsonProperty('recommendation')]
    public ?string $recommendation;

    /**
     * @var ?DateTime $resolvedAt
     */
    #[JsonProperty('resolvedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $resolvedAt;

    /**
     * @var ?value-of<AccountHealthInsightSeverity> $severity
     */
    #[JsonProperty('severity')]
    public ?string $severity;

    /**
     * @var ?DateTime $snoozedUntil
     */
    #[JsonProperty('snoozedUntil'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $snoozedUntil;

    /**
     * @var ?value-of<AccountHealthInsightStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $subjectId
     */
    #[JsonProperty('subjectId')]
    public ?string $subjectId;

    /**
     * @var ?string $subjectName
     */
    #[JsonProperty('subjectName')]
    public ?string $subjectName;

    /**
     * @var ?value-of<AccountHealthInsightSubjectType> $subjectType
     */
    #[JsonProperty('subjectType')]
    public ?string $subjectType;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   actions?: ?array<AccountHealthAction>,
     *   detail?: ?string,
     *   detector?: ?value-of<AccountHealthInsightDetector>,
     *   evidence?: ?array<string, mixed>,
     *   firstSeenAt?: ?DateTime,
     *   fixAutomationId?: ?string,
     *   id?: ?string,
     *   lastSeenAt?: ?DateTime,
     *   recommendation?: ?string,
     *   resolvedAt?: ?DateTime,
     *   severity?: ?value-of<AccountHealthInsightSeverity>,
     *   snoozedUntil?: ?DateTime,
     *   status?: ?value-of<AccountHealthInsightStatus>,
     *   subjectId?: ?string,
     *   subjectName?: ?string,
     *   subjectType?: ?value-of<AccountHealthInsightSubjectType>,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->actions = $values['actions'] ?? null;
        $this->detail = $values['detail'] ?? null;
        $this->detector = $values['detector'] ?? null;
        $this->evidence = $values['evidence'] ?? null;
        $this->firstSeenAt = $values['firstSeenAt'] ?? null;
        $this->fixAutomationId = $values['fixAutomationId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastSeenAt = $values['lastSeenAt'] ?? null;
        $this->recommendation = $values['recommendation'] ?? null;
        $this->resolvedAt = $values['resolvedAt'] ?? null;
        $this->severity = $values['severity'] ?? null;
        $this->snoozedUntil = $values['snoozedUntil'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subjectId = $values['subjectId'] ?? null;
        $this->subjectName = $values['subjectName'] ?? null;
        $this->subjectType = $values['subjectType'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
