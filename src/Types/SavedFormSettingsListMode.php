<?php

namespace Sequenzy\Types;

enum SavedFormSettingsListMode: string
{
    case All = "all";
    case None = "none";
    case Specific = "specific";
}
