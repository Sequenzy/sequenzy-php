<?php

namespace Sequenzy\Types;

enum SavedFormSettingsSubmitTokenMode: string
{
    case Inherit = "inherit";
    case Enforce = "enforce";
    case Strict = "strict";
}
