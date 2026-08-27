<?php

namespace Sequenzy\Types;

enum SubscriberStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
