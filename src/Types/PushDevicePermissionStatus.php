<?php

namespace Sequenzy\Types;

enum PushDevicePermissionStatus: string
{
    case Granted = "granted";
    case Provisional = "provisional";
    case Ephemeral = "ephemeral";
    case Denied = "denied";
    case NotDetermined = "not_determined";
}
