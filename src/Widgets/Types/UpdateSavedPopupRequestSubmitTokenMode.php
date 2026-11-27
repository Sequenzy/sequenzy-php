<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedPopupRequestSubmitTokenMode: string
{
    case Inherit = "inherit";
    case Enforce = "enforce";
    case Strict = "strict";
}
