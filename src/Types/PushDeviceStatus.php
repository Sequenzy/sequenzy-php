<?php

namespace Sequenzy\Types;

enum PushDeviceStatus: string
{
    case Active = "active";
    case Invalid = "invalid";
    case Unsubscribed = "unsubscribed";
}
