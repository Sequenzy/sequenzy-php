<?php

namespace Sequenzy\Types;

enum FormCaptureSettingsListMode: string
{
    case All = "all";
    case None = "none";
    case Specific = "specific";
}
