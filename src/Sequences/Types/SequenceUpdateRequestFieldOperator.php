<?php

namespace Sequenzy\Sequences\Types;

enum SequenceUpdateRequestFieldOperator: string
{
    case AnyChange = "any_change";
    case Equals = "equals";
    case NotEquals = "not_equals";
    case OneOf = "one_of";
    case Contains = "contains";
    case NotContains = "not_contains";
    case GreaterThan = "greater_than";
    case LessThan = "less_than";
}
