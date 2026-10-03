<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedPopupRequestResubscribeBehavior: string
{
    case Reactivate = "reactivate";
    case DoubleOptIn = "double_opt_in";
}
