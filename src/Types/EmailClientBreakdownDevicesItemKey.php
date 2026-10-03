<?php

namespace Sequenzy\Types;

enum EmailClientBreakdownDevicesItemKey: string
{
    case Desktop = "desktop";
    case Mobile = "mobile";
    case Tablet = "tablet";
    case Unknown = "unknown";
}
