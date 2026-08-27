<?php

namespace Sequenzy\Types;

enum SubscriberImportRecordStatus: string
{
    case Active = "active";
    case Unsubscribed = "unsubscribed";
    case Bounced = "bounced";
}
