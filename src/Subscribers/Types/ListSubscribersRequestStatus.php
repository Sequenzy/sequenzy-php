<?php

namespace Sequenzy\Subscribers\Types;

enum ListSubscribersRequestStatus: string
{
    case Active = "active";
    case NotSubscribed = "not_subscribed";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
    case All = "all";
}
