<?php

namespace Sequenzy\Subscribers\Types;

enum ListSubscribersRequestStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
    case All = "all";
}
