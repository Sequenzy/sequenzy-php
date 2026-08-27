<?php

namespace Sequenzy\Subscribers\Types;

enum UpdateByExternalIdSubscribersRequestStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
