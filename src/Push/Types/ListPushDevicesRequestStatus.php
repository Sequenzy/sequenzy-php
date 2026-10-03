<?php

namespace Sequenzy\Push\Types;

enum ListPushDevicesRequestStatus: string
{
    case Active = "active";
    case Invalid = "invalid";
    case Unsubscribed = "unsubscribed";
}
