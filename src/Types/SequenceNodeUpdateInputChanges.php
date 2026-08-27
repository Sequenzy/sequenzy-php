<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Type-aware node patch. Use the editableFields and notes from the node's updateHints. Omitted fields are preserved. For action_email nodes, a blocks patch that omits emailPreset never changes the step's format - see blocks on SequenceEmailUpdateInput.
 */
class SequenceNodeUpdateInputChanges extends JsonSerializableType
{
    /**
     * @var ?value-of<SequenceNodeUpdateInputChangesEmailPreset> $emailPreset For action_email nodes, set the linked email's per-email Style > Format. Native block emails may include supported custom HTML blocks. Not supported when the entire email is standalone raw HTML.
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?EmailThemePatch $emailTheme For action_email nodes, override this step's linked email theme only. The company default and every other email are untouched. The patch merges into the email's current theme, and a step with no override merges into the company theme rather than the platform preset. Send null to drop the override so the step follows the company theme again.
     */
    #[JsonProperty('emailTheme')]
    public ?EmailThemePatch $emailTheme;

    /**
     * @param array{
     *   emailPreset?: ?value-of<SequenceNodeUpdateInputChangesEmailPreset>,
     *   emailTheme?: ?EmailThemePatch,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->emailTheme = $values['emailTheme'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
