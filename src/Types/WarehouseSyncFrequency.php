<?php

namespace Sequenzy\Types;

enum WarehouseSyncFrequency: string
{
    case Every15Minutes = "every_15_minutes";
    case Hourly = "hourly";
    case Daily = "daily";
    case Weekly = "weekly";
    case Manual = "manual";
}
