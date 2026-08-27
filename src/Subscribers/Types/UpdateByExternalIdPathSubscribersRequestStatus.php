<?php

namespace Sequenzy\Subscribers\Types;

enum UpdateByExternalIdPathSubscribersRequestStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
