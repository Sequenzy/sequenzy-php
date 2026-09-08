<?php

namespace Sequenzy\Types;

enum LandingPageFormCustomFieldInputType: string
{
    case Text = "text";
    case Phone = "phone";
    case Number = "number";
    case Textarea = "textarea";
    case Select = "select";
    case Radio = "radio";
    case Checkbox = "checkbox";
    case Consent = "consent";
    case Hidden = "hidden";
}
