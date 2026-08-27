<?php

namespace Sequenzy\Types;

enum EmailBlockConditionsItemOperator: string
{
    case Is = "is";
    case IsNot = "is_not";
    case Contains = "contains";
    case NotContains = "not_contains";
    case Gt = "gt";
    case Gte = "gte";
    case Lt = "lt";
    case Lte = "lte";
    case IsEmpty = "is_empty";
    case IsNotEmpty = "is_not_empty";
}
