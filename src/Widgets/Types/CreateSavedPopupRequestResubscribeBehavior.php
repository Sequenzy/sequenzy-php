<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedPopupRequestResubscribeBehavior: string
{
    case Reactivate = "reactivate";
    case DoubleOptIn = "double_opt_in";
}
