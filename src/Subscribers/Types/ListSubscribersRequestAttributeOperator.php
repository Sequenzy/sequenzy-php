<?php

namespace Sequenzy\Subscribers\Types;

enum ListSubscribersRequestAttributeOperator: string
{
    case Is = "is";
    case Contains = "contains";
    case Gt = "gt";
    case Gte = "gte";
    case Lt = "lt";
    case Lte = "lte";
    case IsNotEmpty = "is_not_empty";
}
