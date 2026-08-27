<?php

namespace Sequenzy\Subscribers\Types;

enum CreateImportSubscribersRequestOptInMode: string
{
    case Default_ = "default";
    case Confirmed = "confirmed";
    case DoubleOptIn = "double_opt_in";
}
