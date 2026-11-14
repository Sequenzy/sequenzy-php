<?php

namespace Sequenzy\Subscribers\Types;

enum CreateSubscribersRequestStatus: string
{
    case Active = "active";
    case NotSubscribed = "not_subscribed";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
