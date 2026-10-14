<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Whether the weekly account health check runs and whether it drafts fixes. Checks run every Monday at 05:00 UTC; the schedule and AI budget are fixed. Checks never send email to subscribers or activate anything.
 */
class AccountHealthSettings extends JsonSerializableType
{
    /**
     * @var ?value-of<AccountHealthSettingsAutonomy> $autonomy draft_fixes lets the agent lay out up to 2 inactive draft sequences per check (trigger, timing and empty email steps; no email is written); report_only only reports.
     */
    #[JsonProperty('autonomy')]
    public ?string $autonomy;

    /**
     * @var ?bool $enabled Whether weekly checks run. Manual checks work either way.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @param array{
     *   autonomy?: ?value-of<AccountHealthSettingsAutonomy>,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->autonomy = $values['autonomy'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
