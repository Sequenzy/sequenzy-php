<?php

namespace Sequenzy\DataExports\Types;

enum UpdateDataExportRequestFrequency: string
{
    case Every5Minutes = "every_5_minutes";
    case Every15Minutes = "every_15_minutes";
    case Hourly = "hourly";
    case Daily = "daily";
}
