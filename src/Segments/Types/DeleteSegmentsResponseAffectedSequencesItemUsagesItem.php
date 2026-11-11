<?php

namespace Sequenzy\Segments\Types;

enum DeleteSegmentsResponseAffectedSequencesItemUsagesItem: string
{
    case Trigger = "trigger";
    case Condition = "condition";
    case Filter = "filter";
    case StopCondition = "stop_condition";
    case Audience = "audience";
}
