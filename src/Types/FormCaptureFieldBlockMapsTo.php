<?php

namespace Sequenzy\Types;

enum FormCaptureFieldBlockMapsTo: string
{
    case Email = "email";
    case FirstName = "firstName";
    case LastName = "lastName";
    case Phone = "phone";
    case CustomAttribute = "customAttribute";
}
