<?php

namespace Sequenzy\Types;

enum SequenceStopConditionMatchConfigFieldValueOperator: string
{
    case Equals = "equals";
    case NotEquals = "not_equals";
    case GreaterThan = "greater_than";
    case LessThan = "less_than";
    case Contains = "contains";
    case NotContains = "not_contains";
}
