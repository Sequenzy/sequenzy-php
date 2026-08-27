<?php

namespace Sequenzy\Types;

enum SequenceTriggerPropertyFilterOperator: string
{
    case Exists = "exists";
    case NotExists = "not_exists";
    case Equals = "equals";
    case NotEquals = "not_equals";
    case OneOf = "one_of";
    case Contains = "contains";
    case GreaterThan = "greater_than";
    case LessThan = "less_than";
}
