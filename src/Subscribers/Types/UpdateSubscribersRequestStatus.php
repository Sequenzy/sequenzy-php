<?php

namespace Sequenzy\Subscribers\Types;

enum UpdateSubscribersRequestStatus: string
{
    case Active = "active";
    case NotSubscribed = "not_subscribed";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
    case Complained = "complained";
}
