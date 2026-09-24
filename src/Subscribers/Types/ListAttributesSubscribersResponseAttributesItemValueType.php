<?php

namespace Sequenzy\Subscribers\Types;

enum ListAttributesSubscribersResponseAttributesItemValueType: string
{
    case String = "string";
    case Number = "number";
    case Boolean = "boolean";
}
