<?php

namespace Sequenzy\Types;

enum FormCaptureSettingsResubscribeBehavior: string
{
    case Reactivate = "reactivate";
    case DoubleOptIn = "double_opt_in";
}
