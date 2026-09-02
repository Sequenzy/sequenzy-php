<?php

namespace Sequenzy\Types;

enum NotificationPreferenceMode: string
{
    case Off = "off";
    case Instant = "instant";
    case Daily = "daily";
    case Weekly = "weekly";
}
