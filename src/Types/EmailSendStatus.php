<?php

namespace Sequenzy\Types;

enum EmailSendStatus: string
{
    case Pending = "pending";
    case Sent = "sent";
    case Delivered = "delivered";
    case Opened = "opened";
    case Clicked = "clicked";
    case Bounced = "bounced";
    case Complained = "complained";
    case Failed = "failed";
    case Suppressed = "suppressed";
}
