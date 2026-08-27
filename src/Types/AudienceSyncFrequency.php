<?php

namespace Sequenzy\Types;

enum AudienceSyncFrequency: string
{
    case Hourly = "hourly";
    case Daily = "daily";
    case Weekly = "weekly";
}
