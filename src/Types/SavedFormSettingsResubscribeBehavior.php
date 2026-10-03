<?php

namespace Sequenzy\Types;

enum SavedFormSettingsResubscribeBehavior: string
{
    case Reactivate = "reactivate";
    case DoubleOptIn = "double_opt_in";
}
