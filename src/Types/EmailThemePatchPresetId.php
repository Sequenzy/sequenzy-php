<?php

namespace Sequenzy\Types;

enum EmailThemePatchPresetId: string
{
    case Default_ = "default";
    case Soft = "soft";
    case Editorial = "editorial";
    case Bold = "bold";
}
