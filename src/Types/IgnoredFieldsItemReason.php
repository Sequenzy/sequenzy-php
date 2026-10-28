<?php

namespace Sequenzy\Types;

enum IgnoredFieldsItemReason: string
{
    case UnknownField = "unknown_field";
    case NotAnObject = "not_an_object";
}
