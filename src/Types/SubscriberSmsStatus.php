<?php

namespace Sequenzy\Types;

enum SubscriberSmsStatus: string
{
    case NotSubscribed = "not_subscribed";
    case Pending = "pending";
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
}
