<?php

namespace Sequenzy\Types;

enum SubscriberStatus: string
{
    case Active = "active";
    case NotSubscribed = "not_subscribed";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
