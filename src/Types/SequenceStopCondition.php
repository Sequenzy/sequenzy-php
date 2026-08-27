<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Auto-stop condition, re-evaluated before every step including the first one. has_tag, added_to_list, entered_segment, field_changed, and event_received stop the run once the thing happens. event_received only counts events received after enrollment - the enrolling event and earlier history never satisfy the stop. does_not_have_tag and removed_from_list stop the run whenever the subscriber lacks that tag or list membership, so they act as a required-tag or required-list allowlist and cancel everyone else before any step sends. Guarded-out contacts still enroll and are then cancelled at the trigger node, so they appear as cancellations there rather than in the active or waiting enrollment counts. Clearing the guard does not retry them: they only receive the sequence if the trigger fires for them again, and on the one_time enrollment mode not even then.
 */
class SequenceStopCondition extends JsonSerializableType
{
    /**
     * @var ?SequenceStopConditionMatchConfig $matchConfig Optional typed match rule. event_received uses event_property_filter propertyFilters (stop only when an event received after enrollment matches every filter, e.g. quota_used greater_than 1) or event_property rules (stop only when the stop event's field equals the same field captured on the enrolling event); field_changed uses a field_value comparison. Tag/list defaults use entry_audience to resolve the required tag or list per enrollment. Tag entry matching requires a tag_added trigger; list entry matching requires a contact_added trigger scoped to at least one specific list.
     */
    #[JsonProperty('matchConfig')]
    public ?SequenceStopConditionMatchConfig $matchConfig;

    /**
     * @var ?value-of<SequenceStopConditionType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $value Tag name, list ID, segment ID, field path, or event name. For the does_not_have_tag and removed_from_list guards this is the tag or list a subscriber must have to keep receiving the sequence. Null with entry_audience matching means the tag or list that enrolled each contact is used.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   matchConfig?: ?SequenceStopConditionMatchConfig,
     *   type?: ?value-of<SequenceStopConditionType>,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->matchConfig = $values['matchConfig'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
