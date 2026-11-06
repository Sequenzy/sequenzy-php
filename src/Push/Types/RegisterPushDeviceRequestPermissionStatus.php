<?php

namespace Sequenzy\Push\Types;

enum RegisterPushDeviceRequestPermissionStatus: string
{
    case Granted = "granted";
    case Provisional = "provisional";
    case Ephemeral = "ephemeral";
    case Denied = "denied";
    case NotDetermined = "not_determined";
}
