<?php

namespace Sequenzy\AudienceSyncs\Types;

enum CreateAudienceSyncsRequestFrequency: string
{
    case Hourly = "hourly";
    case Daily = "daily";
    case Weekly = "weekly";
}
