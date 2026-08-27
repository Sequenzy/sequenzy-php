<?php

namespace Sequenzy\Lists\Types;

enum AddSubscribersListsRequestOptInMode: string
{
    case Default_ = "default";
    case Confirmed = "confirmed";
    case DoubleOptIn = "double_opt_in";
}
