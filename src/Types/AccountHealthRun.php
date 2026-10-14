<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;

/**
 * One account health check.
 */
class AccountHealthRun extends JsonSerializableType
{
    /**
     * @var ?DateTime $completedAt
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?int $draftsCreated Inactive draft sequences this check created.
     */
    #[JsonProperty('draftsCreated')]
    public ?int $draftsCreated;

    /**
     * @var ?DateTime $emailedAt When the report email send was claimed for this run. Set once, before the first recipient, so a retry never sends it twice.
     */
    #[JsonProperty('emailedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $emailedAt;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $insightCount Open insights after this check.
     */
    #[JsonProperty('insightCount')]
    public ?int $insightCount;

    /**
     * @var ?int $newInsightCount Insights that were not open before this check.
     */
    #[JsonProperty('newInsightCount')]
    public ?int $newInsightCount;

    /**
     * @var ?DateTime $scheduledFor
     */
    #[JsonProperty('scheduledFor'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledFor;

    /**
     * @var ?value-of<AccountHealthRunSkippedReason> $skippedReason
     */
    #[JsonProperty('skippedReason')]
    public ?string $skippedReason;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?AccountHealthRunStats $stats This period against the one before (7 days for weekly checks, 30 for monthly).
     */
    #[JsonProperty('stats')]
    public ?AccountHealthRunStats $stats;

    /**
     * @var ?value-of<AccountHealthRunStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $summary Short AI-written summary. Null when the AI step did not run (budget exhausted or the call failed).
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?value-of<AccountHealthRunTrigger> $trigger
     */
    #[JsonProperty('trigger')]
    public ?string $trigger;

    /**
     * @param array{
     *   completedAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   draftsCreated?: ?int,
     *   emailedAt?: ?DateTime,
     *   error?: ?string,
     *   id?: ?string,
     *   insightCount?: ?int,
     *   newInsightCount?: ?int,
     *   scheduledFor?: ?DateTime,
     *   skippedReason?: ?value-of<AccountHealthRunSkippedReason>,
     *   startedAt?: ?DateTime,
     *   stats?: ?AccountHealthRunStats,
     *   status?: ?value-of<AccountHealthRunStatus>,
     *   summary?: ?string,
     *   trigger?: ?value-of<AccountHealthRunTrigger>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->completedAt = $values['completedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->draftsCreated = $values['draftsCreated'] ?? null;
        $this->emailedAt = $values['emailedAt'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->insightCount = $values['insightCount'] ?? null;
        $this->newInsightCount = $values['newInsightCount'] ?? null;
        $this->scheduledFor = $values['scheduledFor'] ?? null;
        $this->skippedReason = $values['skippedReason'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->trigger = $values['trigger'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
