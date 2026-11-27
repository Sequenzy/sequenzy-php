<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedFormRequestSubmitTokenMode: string
{
    case Inherit = "inherit";
    case Enforce = "enforce";
    case Strict = "strict";
}
