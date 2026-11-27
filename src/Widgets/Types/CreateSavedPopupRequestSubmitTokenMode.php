<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedPopupRequestSubmitTokenMode: string
{
    case Inherit = "inherit";
    case Enforce = "enforce";
    case Strict = "strict";
}
