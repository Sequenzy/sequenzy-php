<?php

namespace Sequenzy\Types;

enum CompanyDarkModeLogoStatus: string
{
    case Pending = "pending";
    case Outlined = "outlined";
    case NotNeeded = "not_needed";
    case Custom = "custom";
}
