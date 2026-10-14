<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountHealthOverviewEligibility extends JsonSerializableType
{
    /**
     * @var ?int $activityDays
     */
    #[JsonProperty('activityDays')]
    public ?int $activityDays;

    /**
     * @var ?bool $eligible True when hasMinimumSubscribers and sentRecently are both true.
     */
    #[JsonProperty('eligible')]
    public ?bool $eligible;

    /**
     * @var ?bool $hasMinimumSubscribers Whether the workspace has more than minimumActiveSubscribers active subscribers.
     */
    #[JsonProperty('hasMinimumSubscribers')]
    public ?bool $hasMinimumSubscribers;

    /**
     * @var ?int $minimumActiveSubscribers
     */
    #[JsonProperty('minimumActiveSubscribers')]
    public ?int $minimumActiveSubscribers;

    /**
     * @var ?bool $sentRecently Whether the workspace sent at least one non-test email in the last activityDays days.
     */
    #[JsonProperty('sentRecently')]
    public ?bool $sentRecently;

    /**
     * @param array{
     *   activityDays?: ?int,
     *   eligible?: ?bool,
     *   hasMinimumSubscribers?: ?bool,
     *   minimumActiveSubscribers?: ?int,
     *   sentRecently?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activityDays = $values['activityDays'] ?? null;
        $this->eligible = $values['eligible'] ?? null;
        $this->hasMinimumSubscribers = $values['hasMinimumSubscribers'] ?? null;
        $this->minimumActiveSubscribers = $values['minimumActiveSubscribers'] ?? null;
        $this->sentRecently = $values['sentRecently'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
