<?php

namespace Sequenzy\Types;

enum EmailBlockConditionsItemField: string
{
    case Variable = "variable";
    case Attribute = "attribute";
    case Email = "email";
    case FirstName = "firstName";
    case LastName = "lastName";
}
