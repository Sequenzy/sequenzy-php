<?php

namespace Sequenzy\Subscribers\Types;

enum CreateSubscribersRequestOptInMode: string
{
    case Default_ = "default";
    case Confirmed = "confirmed";
    case DoubleOptIn = "double_opt_in";
}
