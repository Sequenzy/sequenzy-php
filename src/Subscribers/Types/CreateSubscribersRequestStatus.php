<?php

namespace Sequenzy\Subscribers\Types;

enum CreateSubscribersRequestStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
