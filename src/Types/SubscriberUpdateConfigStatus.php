<?php

namespace Sequenzy\Types;

enum SubscriberUpdateConfigStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
