<?php

namespace Sequenzy\Widgets\Types;

enum UpdateSavedFormRequestResubscribeBehavior: string
{
    case Reactivate = "reactivate";
    case DoubleOptIn = "double_opt_in";
}
