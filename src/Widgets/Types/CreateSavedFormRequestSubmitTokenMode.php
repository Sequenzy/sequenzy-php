<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedFormRequestSubmitTokenMode: string
{
    case Inherit = "inherit";
    case Enforce = "enforce";
    case Strict = "strict";
}
