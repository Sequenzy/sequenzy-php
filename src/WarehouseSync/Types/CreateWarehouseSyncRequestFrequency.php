<?php

namespace Sequenzy\WarehouseSync\Types;

enum CreateWarehouseSyncRequestFrequency: string
{
    case Every15Minutes = "every_15_minutes";
    case Hourly = "hourly";
    case Daily = "daily";
    case Weekly = "weekly";
    case Manual = "manual";
}
