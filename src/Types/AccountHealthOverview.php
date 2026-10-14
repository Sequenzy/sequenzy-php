<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class AccountHealthOverview extends JsonSerializableType
{
    /**
     * @var ?AccountHealthOverviewEligibility $eligibility
     */
    #[JsonProperty('eligibility')]
    public ?AccountHealthOverviewEligibility $eligibility;

    /**
     * @var ?array<AccountHealthInsight> $insights Open and snoozed insights, most severe first.
     */
    #[JsonProperty('insights'), ArrayType([AccountHealthInsight::class])]
    public ?array $insights;

    /**
     * @var ?AccountHealthRun $latestRun
     */
    #[JsonProperty('latestRun')]
    public ?AccountHealthRun $latestRun;

    /**
     * @var ?DateTime $nextRunAt Next scheduled check. Null when checks are off, the workspace is not eligible, or the scheduled slot has passed and the check has not started yet.
     */
    #[JsonProperty('nextRunAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRunAt;

    /**
     * @var ?bool $runInProgress True while a check is queued or running. Poll until false.
     */
    #[JsonProperty('runInProgress')]
    public ?bool $runInProgress;

    /**
     * @var ?AccountHealthSettings $settings
     */
    #[JsonProperty('settings')]
    public ?AccountHealthSettings $settings;

    /**
     * @param array{
     *   eligibility?: ?AccountHealthOverviewEligibility,
     *   insights?: ?array<AccountHealthInsight>,
     *   latestRun?: ?AccountHealthRun,
     *   nextRunAt?: ?DateTime,
     *   runInProgress?: ?bool,
     *   settings?: ?AccountHealthSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eligibility = $values['eligibility'] ?? null;
        $this->insights = $values['insights'] ?? null;
        $this->latestRun = $values['latestRun'] ?? null;
        $this->nextRunAt = $values['nextRunAt'] ?? null;
        $this->runInProgress = $values['runInProgress'] ?? null;
        $this->settings = $values['settings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
