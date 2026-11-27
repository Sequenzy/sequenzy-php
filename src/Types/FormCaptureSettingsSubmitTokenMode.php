<?php

namespace Sequenzy\Types;

enum FormCaptureSettingsSubmitTokenMode: string
{
    case Inherit = "inherit";
    case Enforce = "enforce";
    case Strict = "strict";
}
