<?php

namespace Sequenzy\Types;

enum FilterLeafOperator: string
{
    case Is = "is";
    case IsNot = "is_not";
    case IsEmpty = "is_empty";
    case IsNotEmpty = "is_not_empty";
    case Contains = "contains";
    case NotContains = "not_contains";
    case LessThan = "less_than";
    case MoreThan = "more_than";
    case IsTemporaryBounce = "is_temporary_bounce";
    case IsPermanentBounce = "is_permanent_bounce";
    case AtLeast = "at_least";
    case LessThanCount = "less_than_count";
    case Gte = "gte";
    case Lte = "lte";
    case Gt = "gt";
    case Lt = "lt";
}
