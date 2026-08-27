<?php

namespace Sequenzy\Types;

enum SequenceStopConditionType: string
{
    case None = "none";
    case HasTag = "has_tag";
    case DoesNotHaveTag = "does_not_have_tag";
    case AddedToList = "added_to_list";
    case RemovedFromList = "removed_from_list";
    case EnteredSegment = "entered_segment";
    case FieldChanged = "field_changed";
    case EventReceived = "event_received";
}
