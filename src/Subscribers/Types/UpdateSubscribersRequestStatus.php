<?php

namespace Sequenzy\Subscribers\Types;

enum UpdateSubscribersRequestStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
