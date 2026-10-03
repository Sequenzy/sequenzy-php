<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedFormRequestResubscribeBehavior: string
{
    case Reactivate = "reactivate";
    case DoubleOptIn = "double_opt_in";
}
