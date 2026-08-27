<?php

namespace Sequenzy\AudienceSyncs\Types;

enum UpdateAudienceSyncsRequestFrequency: string
{
    case Hourly = "hourly";
    case Daily = "daily";
    case Weekly = "weekly";
}
